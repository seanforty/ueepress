<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/18
 * Time: 7:21
 */

namespace app\api\service;

use libs\Config;

class Upload
{
    protected $fileInfo       = array();	//数组,   $_FILES文件信息
    protected $fileName       = '';			//字符串, 文件名称
    protected $destinationDir = 'uploads/';	//字符串, 默认上传目录,默认 'uploaded/',必须以'/'结尾
    protected $allowedExt     = array();	//数组,   允许文件后缀列表
    protected $allowedMine    = array();    //数组,   允许文件Mine类型
    protected $imgCheck       = True;		//布尔值, 若是上传图片,检查图片有效性
    protected $maxSize        = 0;			//整型值, 允许最大文件大小,单位为字节,默认为1M
    protected $errMessage     = '';         //字符串, 错误信息
    protected $resultDir      = '';         //字符串, 文件转储之后返回的目录

    /*
     * 构造函数
     *  @param fileInfo array  获取$_FILES后，将， $_FILES['file']传递过来
     */
    public function __construct($fileInfo='',$destinationDir='',$maxSize=1e6,$imgCheck=True,$allowedExt=array('jpg','jpeg','gif','png'),$allowedMine=array('image/jpeg','image/jpg','image/png','image/gif')){
        $this->fileInfo       = $fileInfo;
        $this->fileName       = $this->fileInfo['name'];
        $this->destinationDir = $destinationDir;
        $this->allowedExt     = $allowedExt;
        $this->allowedMine    = $allowedMine;
        $this->imgCheck       = $imgCheck;
        $this->maxSize        = $maxSize;
    }

    public function uploadFile(){
        if( $this->checkError() && $this->checkSize() && $this->checkExt() && $this->checkImg() && $this->checkDestination() && $this->makeFileName()  ){
            $thumbnail = $this->zoomInPic();
            return [true,$this->resultDir,$thumbnail];
        }else{
            return [false,$this->errMessage];
        }
    }

    // 对文件重命名, 并复制文件到指定目录
    protected function makeFileName(){
        $newName = md5( uniqid(microtime(true),true) );
        $tempExt = $this->getExt();
        $this->resultDir = $this->destinationDir.$newName.'.'.$tempExt;
        $flag = move_uploaded_file( $this->fileInfo['tmp_name'], $this->resultDir );
        if($flag){
            return true;
        }else{
            $this->errMessage = "移动文件失败";
            return false;
        }
    }

    // 检查目录是否存在,若不存在则创建
    protected function checkDestination(){
        if( !is_dir($this->destinationDir) ){
            if( mkdir($this->destinationDir,0777,true) ){
                return true;
            }else{
                $this->errMessage = "目前不存在,创建失败";
                return false;
            }
        }else{ //目标目录存在
            return true;
        }
    }

    // 检查是否通过HTTPPOST上传
    protected function checkHTTPPost(){
        if(!is_uploaded_file($this->fileInfo['tmp_name'])){
            $this->errMessage = "非法上传";
            return false;
        }else{
            return true;
        }
    }

    // 检查图片是否有效
    protected function checkImg(){
        if( $this->imgCheck ){
            if( !@getimagesize($this->fileInfo['tmp_name']) ){
                $this->errMessage = "上传的不是有效图片";
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    // 检查上传文件是否为合法Mine类型
    protected function checkMine(){
        if( !in_array($this->fileInfo['type'], $this->allowedMine) ){
            $this->errMessage = "非法MINE类型";
            return false;
        }
        return true;
    }

    //获取上传文件后缀
    protected function getExt(){
        //strtolower( end( explode(".",$this->fileName) ) );
        return strtolower(pathinfo($this->fileInfo['name'], PATHINFO_EXTENSION));
    }

    // 检查文件后缀
    protected function checkExt(){
        $fileExt = $this->getExt();
        if(!in_array($fileExt, $this->allowedExt)){
            $this->errMessage = "上传 文件类型错误";
            return false;
        }else{
            return true;
        }
    }

    // 检查文件大小
    protected function checkSize(){
        if($this->fileInfo['size'] > $this->maxSize){
            $this->errMessage = "上传文件过大";
            return false;
        }else{
            return true;
        }
    }


    //生成图片缩略图
    function zoomInPic($pwidth=100,$pheight=100)
    {
        //获取配置文件中图片宽高
        $width = Config::getConfig("image.width")?Config::getConfig("image.width"):$pwidth;
        $height = Config::getConfig("image.height")?Config::getConfig("image.height"):$pheight;

        //获取图像资源变量
        $resource = null;
        switch($this->fileInfo["type"])
        {
            case 'image/jpeg':
                $resource = @imagecreatefromjpeg($this->resultDir);
                break;
            case 'image/gif':
                $resource = @imagecreatefromgif($this->resultDir);
                break;
            case 'image/png':
                $resource = @imagecreatefrompng($this->resultDir);
                break;
            case 'image/wbmp':
                $resource = @imagecreatefromwbmp($this->resultDir);
            default:
                return false;
        }

        if(!$resource){
            return false;
        }

        //获取上传图片的宽和高
        $src_w = imagesx($resource);
        $src_h = imagesy($resource);
        //生成缩略图
        //在属性里定义缩略图的宽和高，并将原图按照比例缩放
        //缩放算法是: 新宽/原宽 = 新高/原高,这样就能等比例缩放了.....
        if($src_w > $src_h)
        {
            $new_w = $width;
            $new_h = ceil(($width/$src_w)*$src_h);
        }else{
            $new_h = $height;
            $new_w = ceil(($height/$src_h)*$src_w);
        }

        $paint = imagecreatetruecolor($new_w, $new_h);
        if(!@imagecopyresampled($paint, $resource, 0,0,0,0, $new_w, $new_h, $src_w, $src_h)){
            return false;
        }

        //在原图上保存缩略图
        $outputRes = "";
        $outputPath = $this->resultDir . "." . $width . "x" . $height . "." . $this->getExt();
        switch($this->fileInfo["type"])
        {
            case 'image/jpeg':
                $outputRes = imagejpeg($paint, $outputPath);
                break;
            case 'image/gif':
                $outputRes = imagegif($paint,  $outputPath);
                break;
            case 'image/png':
                $outputRes = imagepng($paint,  $outputPath);
                break;
            case 'image/wbmp':
                $outputRes = imagewbmp($paint,  $outputPath);
                break;
        }
        //释放资源
        imagedestroy($paint);
        if(!$outputRes){
            return false;
        }
        return $outputPath;
    }

    // 检查文件上传error状态
    protected function checkError(){
        //检查传入数组$fileInfo合法性
        if(!is_array($this->fileInfo)){
            $this->errMessage="传入参数fileInfo必须是数组";
            return false;
        }elseif(!isset($this->fileInfo['error'])){
            $this->errMessage="传入参数fileInfo为非法数组";
            return false;
        }

        //检查$_FILES['file']['error']
        $errorCode = $this->fileInfo['error'];
        if($errorCode > 0){
            switch($errorCode){
                case 1:
                    $this->errMessage = "超过了PHP配置文件中upload_max_filesize选项的值";
                case 2:
                    $this->errMessage = "超过了表单中MAX_FILE_SIZE设置的值";
                    break;
                case 3:
                    $this->errMessage = "文件部分被上传";
                    break;
                case 4:
                    $this->errMessage = "请选择上传文件";
                    break;
                case 6:
                    $this->errMessage = "找不到临时文件";
                    break;
                case 7:
                    $this->errMessage = "文件写入失败";
                    break;
                case 8:
                    $this->errMessage = "文件上传中断";
                    break;
                default:
                    $this->errMessage = "文件上传失败";
            }
            return false;
        }else{
            return true;
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/18
 * Time: 6:58
 */
declare(strict_types=1);
namespace app\api\controller;


use app\api\exception\UploadException;
use app\api\model\Menucontent;
use app\api\model\Sliderimg;
use app\api\service\Upload;
use app\libs\validate\MustBePostiveValidate;
use libs\Config;
use libs\Log;
use libs\Request;

class Image extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
    ];
    protected $model;
    public function __construct()
    {
        $this->model = new \app\api\model\Image();
    }

    /*
     * 保存接收上传的图片保存到指定位置，并将图片路径存入数据库
     * Requst Method  POST
     * @param void
     * @return json
     */
    public function add()
    {
        $files = Request::files();
        $file = $files['file'];
        $uploadDir = Config::getConfig("image.upload_dir");
        $res = (new Upload($file,$uploadDir))->uploadFile();
        Log::record("上传图片: " . $res[1]);
        if(true===$res[0]){
            $thumbnail = $res[2]?$res[2]:$res[1];
            $mid = $this->model->addAndReturnID([
                "img_url"=>"/".$res[1],
                "thumbnail"=>"/".$thumbnail
                ]);
            return json([
                "status"=>true,
                "url"=>"/".$thumbnail,
                "mid"=>$mid
            ]);
        }else{
            throw new UploadException($res[1]);
        }
    }

    /*
     * 删除产品
     * RequestMethod POST
     * @param id
     * @return void
     */
    public function delete()
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::post("id");
        $res = $this->model->deleteImgByID(intval($aid));
        DBException($res,"删除失败1");
        return status(true,"删除成功");
    }

    /*
     * 批量产品
     * RequestMethod POST
     * @param string ids
     * @return void
     */
    public function deleteAll()
    {
        $ids = Request::post("ids");
        $res = $this->model->deleteImgByIDs(["id","IN",$ids]);
        DBException($res,"批量删除失败");
        return status(true,"删除成功");
    }

}
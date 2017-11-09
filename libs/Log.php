<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/5
 * Time: 7:24
 */
declare (strict_types=1);
namespace libs;


class Log
{
    protected static $_instance = null;

    /*
    * protected权限
    */
    protected function __construct(){}
    protected function __clone(){}

    /*
     * 返回Log实例
     * @param void
     * @return object
     */
    public static function getInstance():Log
    {
        if(null == self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /*
     * 记录日志
     * @param content string
     * @return void
     */
    public static function record(string $content)
    {
        $path = LOG_PATH . date("Ym");
        if(!self::mk_dir($path)){
            throw new BaseException("Log::record 日志目录创建失败!");
        };
        header("Content-type: text/html; charset=utf-8");
        $logfile = $path ."/". date("d").".log";

        $preline = "----------------------------------------";
        $pretime = date("Y-m-d H:i:s");
        $preurl  = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $prerequest = $_SERVER['REQUEST_METHOD'];
        $content = "\r\n".$preline."\r\n".$pretime ."\r\n". $preurl ."\r\n". $prerequest."\r\n".$content;
        $res = file_put_contents($logfile, $content,FILE_APPEND);
        if(!$res){
            throw new BaseException("Log::record 写入日志失败");
            exit("日志错误");
        }
    }

    /*
     * 循环创建目录
     * @param dir string
     * @return bool
     */
    protected static function mk_dir(string $dir, int $mode = 0755):bool
    {
        if( is_dir($dir) || @mkdir($dir,$mode) ){
            return true;
        }

        if( !( self::mk_dir( dirname($dir),$mode ) ) ){
            return false;
        }

        return @mkdir($dir,$mode);
    }

}
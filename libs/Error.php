<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/11
 * Time: 5:14
 */
declare (strict_types=1);
namespace libs;

use libs\Config;
use libs\exception\ErrorException;
use libs\exception\Handler;

class Error
{
    protected static $handler = ""; //string exception handler

    /*
     * 设置错误及异常
     * @param void
     * @return void
     */
    public static function register()
    {
        error_reporting( Config::getConfig("exception.level") );
        set_error_handler( [__CLASS__,"setError"] );
        set_exception_handler( [__CLASS__,"setException"] );
        register_shutdown_function( [__CLASS__,"systemError"] );
    }

    /*
     * 将错误托管到ErrorException,得到异常实例并交于Handle处理
     * @param errno int
     * @param errstr string
     * @param errfile
     * @param errline
     * @return voids
     */
    public static function setError(int $errno,string $errstr,string $errfile="",int $errline=0)
    {
        $errorEx = new ErrorException($errno,$errstr,$errfile,$errline);    //将错误转化为异常实例
        self::setException($errorEx);
    }

    /*
     * 处理异常
     * @param e Throwable
     * @return void
     */
    public static function setException(\Throwable $e)
    {
        self::getExceptionHandler();
        Response::show(self::$handler->render($e));
    }

    public static function systemError()
    {
        if ($error = error_get_last()) {
            $message = "";
            $separator = "\r\n";
            $message .= "错误:" . $error['message'] . $separator;
            $message .= "文件:" . $error['file'] . $separator;
            $message .= "行数:" . $error['line'] . $separator;
            Response::show($message);
        }
    }

    /*
     * 获取Handle实例并返回
     * @para void
     * @return void
     */
    public static function getExceptionHandler()
    {
        if(!self::$handler)
        {
            $handleClass = \libs\Config::getConfig("exception.handler" );
            if( $handleClass && class_exists($handleClass) && is_subclass_of($handleClass, "\\libs\\exception\\Handler") ){
                self::$handler = new $handleClass();
            }else{
                self::$handler = new \libs\exception\Handler();
            }
        }
    }

}
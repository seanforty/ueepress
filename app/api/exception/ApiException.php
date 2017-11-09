<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 4:00
 */
declare (strict_types=1);
namespace app\api\exception;

use libs\BaseException;
use Throwable;

class ApiException extends BaseException
{
    public $statusCode = 400;
    public $errCode = 999;  //未知错误
    public $errMsg = "未知错误";

    /*
     * @param message string 错误信息
     * @param code int HTTP状态码
     * @param errCode int 错误码
     * @return void
     */
    public function __construct(string $message ="", int $errCode=0, int $code = 0)
    {
        if($message){
            $this->errMsg      = $message;
        }
        if($errCode){
            $this->errCode     = $errCode;
        }
        if($code){
            $this->statusCode  = $code;
        }
    }
}
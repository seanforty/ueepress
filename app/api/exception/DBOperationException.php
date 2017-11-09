<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 4:00
 */

namespace app\api\exception;


class DBOperationException extends ApiException
{
    public $statusCode = 400;
    public $errCode = 300;
    public $errMsg = "数据库操作异常";
}
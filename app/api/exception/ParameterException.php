<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 4:00
 */

namespace app\api\exception;


class ParameterException extends ApiException
{
    public $statusCode = 400;
    public $errCode = 700;
    public $errMsg = "参数错误";
}
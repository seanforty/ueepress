<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 4:00
 */

namespace app\api\exception;


class AdminRoleException extends ApiException
{
    public $statusCode = 400;
    public $errCode = 600;
    public $errMsg = "管理员/角色处理异常";
}
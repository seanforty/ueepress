<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 4:00
 */

namespace app\api\exception;


class UploadException extends ApiException
{
    public $statusCode = 400;
    public $errCode = 800;
    public $errMsg = "图片上传失败";
}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 3:58
 */
declare (strict_types=1);
namespace app\api\exception;

use libs\exception\Handler;
use libs\Response;

class ApiHandler extends Handler
{
    public function render(\Throwable $e):string
    {
        if($e instanceof ApiException){ //API错误
            $result = [
                "errCode"=>$e->errCode,
                "errMsg" =>$e->errMsg
            ];
            return Response::json($result,$e->statusCode);
        }else{  //服务器内部错误
            return parent::render($e);
        }
    }
}
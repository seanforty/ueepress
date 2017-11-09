<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/5
 * Time: 7:24
 */
declare (strict_types=1);
namespace libs\exception;

use libs\Log;
use libs\Config;
use libs\Response;

class Handler
{
    /*
     * 处理异常，可以被重写,默认调用错误页面模板输出并记录到日志文件
     */
    public function render(\Throwable $e):string
    {
        $exInfo  = "Error Message: " . $e->getMessage(). "(" . $e->getCode() . ")<br/>";
        $exInfo .= "Error File: " . $e->getFile() . " : " . $e->getLine() . "<br>\n";
        Log::record($exInfo);
        $this->showError($exInfo);
        return "";
    }

    /*
     * 使用错误页面模板输出错误信息
     * @param string errInfo
     * @return void
     */
    protected function showError(string $exInfo)
    {
        $flag = Config::getConfig("exception.debug");
        if($flag) {
            Response::errorPage(500,$exInfo);
        }else{
            Response::errorPage(404,"Page Not Found, please contact administrator!");
        }
    }
}
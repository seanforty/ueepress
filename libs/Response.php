<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 5:55
 */
declare (strict_types=1);
namespace libs;

class Response
{
    protected static $encoding = "utf-8";   //string
    protected static $contentType = "text/html";    //string

    /*
     * @param result array
     * @param HTTPStatusCode int
     * @return string
     */
    public static function json(array $result,int $HTTPStatusCode=200):string
    {
        self::$contentType = "application/json";
        self::setHeader($HTTPStatusCode);
        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }

    /*
     * 显示内容
     * @param content string
     * @return void
     */
    public static function show(string $content)
    {
        echo($content);
    }

    /*
     * 默认错误展示页面
     * @param int errType  错误类型
     * @param string template 错误页面模板
     * @return void
     */
    public static function errorPage(int $errType,string $errInfo,string $template="")
    {
        self::setHeader($errType);
        if(!$template)
        {
            $errorType = $errType;
            $errorInfo = $errInfo;
            include ErrTemp_PATH."default.php";
        }
    }

    /*
     * 返回HTTP代码
     * @param int responseCode
     * @return void
     */
    protected static function setHeader(int $responseCode)
    {
        header("Content-type:".self::$contentType.";charset=".self::$encoding);
        http_response_code($responseCode);
    }
}
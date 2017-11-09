<?php

/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/21
 * Time: 7:35
 */
declare (strict_types=1);
namespace libs;

use libs\BaseException;
use libs\Config;
use libs\Route;

class URL
{
    /*
     * 输出URL
     * smarty模板中使用样例：{{url path="index/index" params=["id"=>1,"page"=>10]}}
     * php文件中使用样例：url([ "path"=>"index/index", "params"=>["id"=>1,"page"=>10] ]);
     * @param pathinfo array URL路径和参数(数组中元素path为路径，params为参数，参见样例)
     * @return string
     */
    public static function get(array $pathinfo):string
    {
        if( !isset($pathinfo["path"]) ){
            throw new BaseException("URL参数path未设置: ".json_encode($pathinfo));
        }
        $path = $pathinfo["path"];
        $pathArr = self::getPath($path);

        if( isset($pathinfo["params"]) ){
            $params = $pathinfo["params"];
            $paramStr = self::getParam($params);
        }else{
            $paramStr = "";
        }
        if( Config::getConfig("route.simplify_url") ){
            $url = sprintf("/%s/%s/%s?%s",$pathArr[0],$pathArr[1],$pathArr[2],$paramStr);
        }else{
            $url = sprintf("/index.php?module=%s&controller=%s&method=%s&%s",$pathArr[0],$pathArr[1],$pathArr[2],$paramStr);
        }
        if(!$paramStr){
            $url = substr($url,0,strlen($url)-1);
        }
        return $url;
    }

    /*
     * 将关联数组转化为URL参数
     * @param arr array
     * @return string
     */
    protected static function getParam(array $arr):string
    {
        $paramStr = "";
        if(is_array($arr)){
            foreach($arr as $k=>$v){
                $paramStr.= $k."=".$v."&";
            }
            $paramStr = substr($paramStr,0,strlen($paramStr)-1);
        }
        return $paramStr;
    }

    /*
     * 将URL参数转化为module/controller/method, 如未设置则使用默认值
     * @param path string
     * @return array
     */
    protected static function getPath(string $path):array
    {
        $path = trim($path,"/");
        $pathArr = explode("/",$path);
        $len = count($pathArr);
        if(1==$len){
            $module = $pathArr[0];
            $controller = Config::getConfig("route.controller");
            $method = Config::getConfig("route.method");
        }elseif(2==$len){    //缺省module, controller/method 使用当前module
            $module = Route::getModule();
            $controller = $pathArr[0];
            $method = $pathArr[1];
        }elseif(3==$len){   //完整路径 module/controller/method
            $module = $pathArr[0];
            $controller = $pathArr[1];
            $method = $pathArr[2];
        }else{  //参数错误
            throw new \libs\BaseException("URL参数错误: ".$path);
        }
        return [$module,$controller,$method];
    }
}
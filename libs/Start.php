<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/2
 * Time: 6:42
 */
//ob_start();
//定义全局变量
define('UEE_NAME','优亦内容管理系统');
define('UEE_VERSION', 'V1.0');   //框架版本号
DEFINE("DS",DIRECTORY_SEPARATOR);   //目录分隔符
DEFINE("ROOT_PATH",__DIR__ . DS . ".." . DS);    //文件根目录
DEFINE("TEMP_C_PATH",ROOT_PATH . "runtime" . DS . "tempate_c" . DS);    //模板编译目录
DEFINE("CACHE_PATH",ROOT_PATH . "runtime" . DS . "cache" . DS); //模板缓存目录
DEFINE("LOG_PATH",ROOT_PATH . "runtime" . DS . "log" . DS); //日志目录
DEFINE("ErrTemp_PATH",ROOT_PATH . "libs" . DS . "template" . DS . "sys_templates" . DS);    //默认错误页面目录
DEFINE("EXT",".php"); //程序文件后缀

//PSR4自动加载类
require ROOT_PATH . "libs/AutoLoader.php";
(new AutoLoader())->register();

//配置文件
\libs\Config::setConfig(include ROOT_PATH."libs".DS."Convention.php");   //系统配置文件
if( file_exists(APP_PATH."config.php") ){
    \libs\Config::setConfig(include APP_PATH."config.php");   //APP配置文件
}

date_default_timezone_set(\libs\Config::getConfig("other.timezone"));
DEFINE("STATIC",libs\Config::getConfig("template.static_dir")); //静态文件目录

//导入通过函数文件
include "Common.php";
if(file_exists(APP_PATH . "common.php")){
    include APP_PATH . "common.php";
}

//设置异常类
\libs\Error::register();

//连接数据库
\libs\db\DB::connect();

//初始化日志
\libs\Log::getInstance();

//初始化路由
\libs\Route::register();

//ob_end_flush();
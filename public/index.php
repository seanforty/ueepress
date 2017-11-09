<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/8/31
 * Time: 7:49
 */

//应用入口文件(win平台使用"\", Linux平台使用"/")
DEFINE("APP_PATH", __DIR__ . "/../app/");    //定义应用程序路径, 默认app目录
require __DIR__ . "/../libs/Start.php";    //加载启动文件
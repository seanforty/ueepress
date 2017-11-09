<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/3
 * Time: 16:53
 */
declare (strict_types=1);
namespace libs;

/*
 * 支持smarty和twig引擎, 在config中设置
 */
if( \libs\Config::getConfig("template.engine") == "twig"){
    include ROOT_PATH . "libs/template/twig/Autoloader.php";
    class Template extends \Twig_Autoloader{}
}else{
    include ROOT_PATH . "libs/template/smarty/Smarty.class.php";
    class Template extends \Smarty{}
}



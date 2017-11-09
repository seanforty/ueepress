<?php
//配置模板 全部使用小写字母
return [
    //数据库配置
    "database" => [
        "engine"=>"mysql",
        "dbhost"=>"localhost",
        "dbuser"=>"root",
        "dbpwd"=>"root",
        "dbname"=>"mes",
        "prefix"=>"uee_"
    ],

    //默认路由配置
    "route" => [
        //是否开启简化URL
        "simplify_url" => true,
        //入口文件
        "entry" => "index.php",
        //默认module
        "module" => "index",
        //默认controller
        "controller" => "index",
        //默认method
        "method" => "index",
        //URL转发（用于实现伪静态）
        "routes" => [
            ["/page-([0-9]{1,10}).html/","index/page/index"],
            ["/category-([0-9]{1,10})-([0-9]{0,10})\/([0-9]{1,10}).html/","index/category/index"],
        ]
    ],

    //模块配置 模板只支持 smarty和twig, 如未配置,默认使用smarty
    "template" => [
        //模板引擎
        "engine" => "smarty",
        //静态文件存放目录
        "static_dir" => "/static"
    ],

    //异常处理
    "exception" => [
        //是否开启debug模式
        "debug"  => true,
        //默认异常处理类目录
        "handler" => "",
        //异常提示等级，参照：http://php.net/manual/zh/errorfunc.constants.php
        "level"   => "E_ALL"
    ],

    //阅读设置
    "reading" => [
        //分页每页数据数量
        "pagesize" => 10
    ],

    //验证设置
    "validate" => [
        //用户名正则表达式
        "username" => "/^[a-zA-Z0-9_]{5,20}$/",
        //密码正则表达式
        "password" => "/^[a-zA-Z0-9_@#.]{6,20}$/",
    ],

    //图片上传目录和缩略图尺寸设置
    "image"=>[
        "upload_dir" => "uploads/",
        "width" => "250", //缩略图尺寸
        "height" => "250" //缩略图尺寸
    ],

    //其它配置
    "other" => [
        //设置时区
        "timezone" => "PRC",
        //日期格式
        "timeformat" => "Y-m-d"
    ],

];
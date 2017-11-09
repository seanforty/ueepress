<?php
//配置模板
return [
    //异常处理
    "exception" => [
        //是否开启debug模式
        "debug"  => true,
        //默认异常处理类目录
        "handler" => "\\app\\api\\exception\\ApiHandler",
        //异常提示等级，参照：http://php.net/manual/zh/errorfunc.constants.php
        "level"   => "E_ALL"
    ],
];
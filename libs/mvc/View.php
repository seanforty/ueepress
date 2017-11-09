<?php
declare (strict_types=1);
namespace libs\mvc;

use libs\Template;
use libs\Route;

class View
{
    // 存放模板引擎实例
    protected static $temp = null;

    /*
     * 实例化模板引擎,并配置参数
     * @param void
     * @return void
     */
    public static function templateHandler():Template
    {
        if(null !== self::$temp){
            return self::$temp;
        }

        self::$temp = new Template();
        self::$temp
            ->setTemplateDir(APP_PATH . Route::$module . DS . "view" . DS) //设置模板目录
            ->setCompileDir(TEMP_C_PATH) //设置编译目录
            ->setCacheDir(CACHE_PATH); //设置缓存目录
        self::$temp->caching = false;//是否开启缓存
        //$this->temp->cache_filetime = 60*60*24;//设置模板缓存有效时间段的长度为1天
        self::$temp->left_delimiter = '{{';//设置左右结束符 防止和js css 等发生冲突
        self::$temp->right_delimiter = '}}';
        self::$temp->registerPlugin("function","url","url");
        return self::$temp;
    }

    protected function __construct(){}
    protected function __clone(){}
}





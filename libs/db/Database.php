<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/4
 * Time: 4:44
 */
declare (strict_types=1);
namespace libs\db;


class Database
{
    protected static $_instance = null; //单例模式,存放类实例
    protected static $dbh = null;       //存放数据库连接handler

    /*
     * 禁止外部调用构造函数
     * @param void
     * @return void
     */
    protected function __construct(){

    }

    /*
     * 若该类实例存在,直接返回,若不存在则创建后返回
     * @param void
     * @return object
     */
    public static function getInstance(){
        if( null == self::$_instance || !isset(self::$_instance) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /*
     * 禁止外部调用clone方法
     * @paramm void
     * @return void
     */
    protected function __clone(){

    }

}
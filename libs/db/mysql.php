<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/3
 * Time: 21:34
 */
declare (strict_types=1);
namespace libs\db;

use libs\BaseException;
use libs\Config;
use libs\Log;

class mysql extends Database
{
    /*
     * PDO连接数据库
     * @param void
     * @return void
     */
    public static function connect()
    {
        $dbhost = Config::getConfig("database.dbhost");
        $dbuser = Config::getConfig("database.dbuser");
        $dbpwd = Config::getConfig("database.dbpwd");
        $dbname = Config::getConfig("database.dbname");
        self::$dbh = new \PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpwd);
        self::$dbh->query('set names utf8;');   //解决中文乱码问题
    }

    /*
     * 返回查询到的结果集，为空则返回空数组
     * @param sql string sql语句
     * @return array 查询结果，为空则返回空数组
     */
    public static function querySQL(string $sql):array
    {
        $res = self::$dbh->query($sql);
        Log::record($sql);
        if(!$res)
            return array();
        else
            return $res->fetchAll();
    }

    /*
     * 执行SQL语句，返回受影响的记录数目，失败则抛出异常
     * @param sql string
     * @return 成功返回int
     */
    public static function execSQL($sql):int
    {
        $res = self::$dbh->exec($sql);
        if($res === false){
            $errInfo = "Error on database insert, SQL: " . $sql;
            Log::record($errInfo);
            return 0;
        }else{
            Log::record($sql);
            return $res;
        }
    }

    /*
     * 返回最后插入行的id
     * @param void
     * @return string
     */
    public static function lastInsertId():string
    {
        return self::$dbh->lastInsertId();
    }
}























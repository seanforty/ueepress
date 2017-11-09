<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/5
 * Time: 7:24
 */

declare (strict_types=1);

namespace libs;

class Cookie
{
    /*
     * 检查cookie是否存在,存在返回true,否则返回false
     * @param name string
     * @return bool
     */
    public static function hasCookie(string $name):bool
    {
        if( isset($_COOKIE[$name]) ){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 获取cookie, 获取成功返回其值,否则返回false
     * @param name string
     * @return mixed string/bool
     */
    public static function getCookie(string $name)
    {
        if( self::hasCookie($name) ){
            return $_COOKIE[$name];
        }else{
            return false;
        }
    }

    /*
     * 设置cookie,session开启失败返回false,否则设置后返回true
     * @param name string
     * @param value string
     * @param expire int cookie有效期
     * @param path string   见原生setcookie函数
     * @param domain string 见原生setcookie函数
     * @return bool
     */
    public static function setCookie(string $name,string $value="",int $expire=3600,string $path="/",$domain=""):bool
    {
        if(setcookie($name,$value,time()+$expire,$path)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 删除指定cookie,存在并删除返回true,否则返回false
     * @param name string
     * @return bool
     */
    public static function deleteCookie(string $name,$path="/",$domain=""):bool
    {
        setcookie($name,"",time()-20,$path,$domain);
        return true;
    }

    /*
     * 删除当前cookie的所有相关信息,成功返回true,失败返回false
     * @param void
     * @return void
     */
    public static function clearCookie()
    {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key,"",time()-1);
        }
    }

}
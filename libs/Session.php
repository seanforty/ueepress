<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/5
 * Time: 7:24
 */
declare (strict_types=1);
namespace libs;


class Session
{
    /*
     * 检查session是否存在,存在返回true,否则返回false
     * @param name string
     * @return bool
     */
	public static function hasSession(string $name):bool
    {
        if (!session_id()){
            session_start();
        }
		if( isset($_SESSION[$name]) ){
		    return true;
        }else{
		    return false;
        }
	}

	/*
	 * 获取session,获取成功返回其值,否则返回false
	 * @param name string
	 * @return string
	 */
	public static function getSession(string $name)
    {
        if (!session_id()){
            session_start();
        }
        return $_SESSION[$name];
	}

	/*
	 * 设置session,session开启失败返回false,否则设置后返回true
	 * @param name string
	 * @param value string
	 * @return bool
	 */
	public static function setSession(string $name,string $value):bool
    {
        if (!session_id()){
            session_start();
        }
        $_SESSION[$name]=$value;
        return true;
	}

	/*
	 * 删除指定session,存在并删除返回true,否则返回false
	 * @param name string
	 * @return bool
	 */
	public static function deleteSession(string $name)
    {
        unset( $_SESSION[$name] );
	}

	/*
	 * 删除当前session的所有相关信息,成功返回true,失败返回false
	 * @param void
	 * @return bool
	 */
	public static function clearSession():bool
    {
	    if(session_destroy()){
	        return true;
        }else{
	        return false;
        }
	}

}
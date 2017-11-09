<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/5
 * Time: 7:24
 */
declare (strict_types=1);
namespace libs;


class Request
{
	/*
	 * 获取GET方式请求数据，使用addslashes并返回
	 * 无参数时返回数组
	 * 参数不存在时返回空字符串
	 * 参数存在返回字符串
	 * @param param string
	 * @return mixed string/array
	 */
	public static function get(string $param="")
    {
		if(!$param){
			$requestData = $_GET; //返回数组
		}elseif(isset($_GET[$param])){
			$requestData = $_GET["$param"];
		}else{
            $requestData = "";
        }
		$requestData = self::addslashesToRequest($requestData);
		return $requestData;
	}

    /*
     * 获取POST方式请求数据并返回
	 * 无参数时返回数组
	 * 参数不存在时返回空字符串
	 * 参数存在返回字符串
     * @param param string
     * @return mixed string/array
     */
	public static function post(string $param="")
    {
		if(!$param){
			$requestData = $_POST;
		}elseif(isset($_POST[$param])){
			$requestData = $_POST[$param];
		}else{
            $requestData = "";
        }
        $requestData = self::addslashesToRequest($requestData);
		return $requestData;
	}

	/*
	 * 对参数数组中的元素，依次使用request中的post方法遍历
	 * @param arr array
	 * @return array
	 */
	public static function postMany(array $arr):array
    {
        $data = array();
        foreach($arr as $each)
        {
            $data[$each] = self::post($each);
        }
        return $data;
    }

    /*
     * 判断请求方式并返回获取的数据
     * 如果不是GET/POST,则使用REQUEST方式获取(get/post/cookie)数据
     * @param param string
     * @return mixed string/array
     */
	public static function param(string $param="")
    {
		$requestMethod = $_SERVER['REQUEST_METHOD'];
		switch($requestMethod){
			case "GET":
				$requestData = $param?(isset($_GET[$param])?$_GET[$param]:""):$_GET;
				break;
			case "POST":
				$requestData = $param?(isset($_POST[$param])?$_POST[$param]:""):$_POST;
				break;
			default:
				$requestData = $param?(isset($_REQUEST[$param])?$_REQUEST[$param]:""):$_REQUEST;
		}
        $requestData = self::addslashesToRequest($requestData);
		return $requestData;
	}
	
    /*
	 * 获取$_FILES数据
	 */
	public static function files()
    {
		$requestData = $_FILES;
		return $requestData;
	}

	/*
	 * 判断GET中param变量是否存在,存在返回true,不存在返回false
	 * @param param string
	 * @return bool
	 */
	public static function hasGet(string $param):bool
    {
	    if( isset($_GET[$param]) ){
	        return true;
        }else{
	        return false;
        }
	}

    /*
     * 判断POST中param变量是否存在,存在返回true,不存在返回false
     * @param param string
     * @return bool
     */
	public static function hasPost(string $param):bool
    {
        if( isset($_POST[$param]) ){
            return true;
        }else{
            return false;
        }
	}

	/*
	 * 对提交的数据使用addslashes加反斜杠并返回
	 * 如果参数为字符串，直接addslashes处理并返回
	 * 如果参数为数组，把数组内元素分别使用addslashes处理后再返回
	 * @param data string/array
	 * @return mixed string/array
	 */
	public static function addslashesToRequest($data)
    {
        if( !get_magic_quotes_gpc() ){
            if(!is_array($data)){
                $data = addslashes($data);
            }else{
                foreach ($data as &$v){
                    if(is_string($v)) $v = addslashes($v);
                }
            }
        }
        return $data;
    }

}
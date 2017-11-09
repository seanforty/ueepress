<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/2
 * Time: 7:26
 */

declare (strict_types=1);

namespace libs;

class Config
{
    protected static $config = array();
    protected static $range = "_sys_";

    /*
     * @config mixed string/array 加载配件文件信息或者单独配置
     * @value string 单独配置时使用,配置值
     * @range string 配置的生效范围
     * @return mixed string/array 返回配置成功的信息
     */
    public static function setConfig($config,string $value="",string $range="")
    {
        $range = $range?strtolower($range):self::$range;    //$range默认使用"_sys_"
        if( !isset(self::$config[$range]) ){
            self::$config[$range] = [];
        }

        if( is_array($config) ){    //加载配置文件, 将配置文件中的数组与已有数组合并
            return self::$config[$range] = array_merge( self::$config[$range], array_change_key_case($config,CASE_LOWER));
        }elseif( is_string($config) ){  //单独配置
            if( strpos($config,".") ){
                $configArr = explode(".",$config);
                return self::$config[$range][$configArr[0]][$configArr[1]] = $value;
            }else{
                return self::$config[$range][$config] = $value;
            }
        }
    }

    /*
     * 获取配置信息，如果参数未配置则返回false
     * @param config string
     * @param range string
     * @return mixed string/array/bool
     */
    public static function getConfig(string $config="",string $range=""){
        $range = $range?strtolower($range):self::$range;    //$range默认使用"_sys_"
        $config = strtolower($config);
        if( strpos($config,".") ){
            $configArr = explode(".",$config);
            return isset(self::$config[$range][$configArr[0]][$configArr[1]])?self::$config[$range][$configArr[0]][$configArr[1]]:false;
        }else{
            return isset(self::$config[$range][$config])?self::$config[$range][$config]:false;
        }
    }

    /*
     * 获取类静态属性值
     * @param string name
     * @return string
     */
    public static function printConfig()
    {
        print_r(self::$config);
    }
}
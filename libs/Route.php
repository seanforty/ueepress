<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/3
 * Time: 9:40
 */
declare (strict_types=1);
namespace libs;

use libs\Config;
use libs\Response;

class Route
{
    public static $module= "";
    public static $controller= "";
    public static $method= "";
    public static $params = [];

    /*
     * 初始化路由
     * 原始路径 localhost/index.php?module=index&controller=index&method=index&...
     */
    public static function register()
    {
        self::defaultRoute();

        if(!self::isSimplifyURL()){
            self::setURLRouter("module");
            self::setURLRouter("controller");
            self::setURLRouter("method");
        }

        self::loadModuleConfig(self::$module);
        self::run(self::$module,self::$controller,self::$method,self::$params);
    }

    /*
     * 获取配置文件中的值
     * @param void
     * @return void
     */
    protected static function defaultRoute(){
        self::$module = Config::getConfig("route.module");
        self::$controller = Config::getConfig("route.controller");
        self::$method = Config::getConfig("route.method");
    }

    /*
	 * 验证是否是简化URL，是则返回TRUE，否则返回FALSE
     * @param void
	 * @return bool
     */
    protected static function isSimplifyURL():bool
    {
        $path = trim($_SERVER['PHP_SELF'],"/");
        $index = Config::getConfig("route.entry");
        if( $index != $path && (0===strpos($path,$index)) ){
            $dir = substr($path, strlen($index) );
            $data = self::routeMatch($dir);
            return self::getSimplifyURL( trim($data[0],"/"),$data[1] );
        }else{
            return false;
        }
    }

    protected static function routeMatch($dir)
    {
        $routes = Config::getConfig("route.routes");
        if(!$routes){ //如果配置为空，返回
            return $dir;
        }
        foreach($routes as $v){
            if(preg_match($v[0],$dir,$matches)){
                $dir = $v[1];
                break;
            }
        }
        return [$dir,$matches];
    }

    /*
	 * 获取简化路径中的信息
     * @param str string
	 * @return bool
     */
    protected static function getSimplifyURL(string $str,array $matches):bool
    {
        $arr = explode("/",$str);
        if(isset($arr[0])){
            self::$module=$arr[0];
        }
        if(isset($arr[1])){
            self::$controller=$arr[1];
        }
        if(isset($arr[2])){
            self::$method=$arr[2];
        }
        if($matches){
            self::$params = array_slice($matches,1);
        }

        return true;
    }

    /*
     * 调用controller中的方法并输出
     * @param module,controller,method string
     * @return void
     */
    protected static function run(string $module,string $controller,string $method,array $params)
    {
        $content = "";
        eval("\$temp = new \app\\$module\controller\\$controller();");
        eval("\$content .= \$temp->beforeAction(\$method);");
        if(self::$params){
            $str = "\$content .= \$temp->\$method(";
            $str .= implode(",",$params);
            $str .= ");";
            eval($str);
        }else{
            eval("\$content .= \$temp->\$method();");
        }
        Response::show($content);
    }

    /*
     * 获取并检查URL参数合法性(要求只能由数字和字母组成),如不存在则返回index
     * @param route string (module, controller, method)
     * @return void
     */
    protected static function setURLRouter(string $route)
    {
        if( isset($_GET[$route]) && ctype_alnum($_GET[$route]) ){
            switch($route){
                case "module":
                    self::$module = $_GET["module"];
                    break;
                case "controller":
                    self::$controller = $_GET["controller"];
                    break;
                case "method":
                    self::$method = $_GET["method"];
                    break;
            }
        }
    }

    /*
     * 获取模块名
     * @param void
     * @return string
     */
    public static function getModule():string
    {
        if(self::$module){
            return self::$module;
        }else{
            self::setURLRouter("module");
            self::getModule();
        }
    }

    /*
     * 加载APP中模块内配置文件
     * @param module string APP中模块名
     * @return void
     */
    protected static function loadModuleConfig(string $module)
    {
        if(file_exists(APP_PATH . $module . "/config.php" )){
            Config::setConfig(include APP_PATH . $module . "/config.php");   //APP模块配置文件
        }
    }
}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/8/31
 * Time: 7:49
 */

declare (strict_types=1);
include "BaseException.php";

class AutoLoader{

    /*
     * spl_autoload_register 注册给定的函数作为 __autoload 的实现
     * @param void
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /*
     * 传入命名空间形式的类路径,转换成绝对路径并加载
     * @param path string 命名空间路径
     * @return void
     */
    public function loadClass(string $path)
    {
        $path = ltrim($path,"\\"); //去除namespace中开头的反斜线
        $pos = strrpos($path,"\\"); //从后向前查找反斜线,获取第一个反斜线位置
        if(!$pos){
            return null;    //若命名空间路径中无反斜线,不加载
        }
        $namespace = substr($path,0,$pos);
        $className = substr($path,$pos+1);
        $newPath = $this->getPath($namespace,$className);
        if($newPath){
            $this->requireClass($newPath);
        }
    }

    /*
     * 传入命名空间和类名, 组装成类所在文件的绝对路径(要求文件与类同名)
     * @param namespace string
     * @param classname string
     * @return string 返回文件路径
     */
    protected function getPath(string $namespace,string $classname):string
    {
        $filename = str_replace("\\", DS, $namespace);
        $realpath = realpath( ROOT_PATH . $filename . DS . $classname . EXT );
        if($realpath){
            return $realpath;
        }else{
            return "";
        }
    }

    /*
     * 使用require加载文件
     * @param path string
     * @return void
     */
    protected function requireClass(string $path)
    {
        if( file_exists($path) ){
            require $path;
        }else{
            $this->throwException("AutoLoader::requireClass加载文件不存在: " . $path);
        }
    }

    /*
     * 使用include加载文件
     * @param path string
     * @return void
     */
    protected function includeClass(string $path)
    {
        if( file_exists($path) ){
            include $path;
        }else{
            $this->throwException("AutoLoader::includeClass加载文件不存在: " . $path);
        }
    }

    /*
     * 抛出BaseException异常
     * @param string info
     * @return void
     */
    protected function throwException($info)
    {
        throw new \libs\BaseException($info);
    }
}
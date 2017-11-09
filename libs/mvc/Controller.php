<?php
declare (strict_types=1);
namespace libs\mvc;

class Controller
{
    // @handler object 存放模板引擎实例
    protected static $handler = null;

    /*
     * @beforeActionList array
     * key 需要在执行前验证的方法
     * value key方法执行前需要执行的方法
     */
    protected $beforeActionList = [
        "addProduct"=>"loginCheck"
    ];

    /*
     * 构造函数,实例化View对象和模板引擎
     * @param void
     * @return void
     */
    public function __construct()
    {
        $this->getInstance();
    }

    /*
     * 获取实例
     * @param void
     * @return void
     */
    protected function getInstance()
    {
        if(null == self::$handler){
            self::$handler = View::templateHandler();
        }
    }

    /*
     * 前置方法,在执行某些方法之前调用指定方法
     * @param method string 路由获取到的要执行的方法
     * @return mixed/void
     */
    public function beforeAction(string $method)
    {
        foreach ($this->beforeActionList as $k=>$v){
            if($k == $method){
                return call_user_func([$this,$v]);
            }
        }
    }

    /*
     * 绑定参数到模板
     * @param var string 绑定变量名
     * @param value mixed 绑定的值,可以为array/string
     * @return void
     */
    public function assign(string $var="",$value="")
    {
        self::$handler?:$this->getInstance();
        self::$handler->assign($var,$value);
    }

    /*
     * 显示模板
     * @param template 绑定的模板
     * @return void
     */
    public function display(string $template="")
    {
        self::$handler?:$this->getInstance();
        self::$handler->display($template . ".html");
    }

    /*
     * 获取当前控制器名，全小写
     * @param void
     * @return string
     */
    public function getController():string
    {
        $tempArr = explode(DS,get_called_class());
        return strtolower(end($tempArr));
    }

}
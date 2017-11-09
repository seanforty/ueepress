<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/13
 * Time: 4:50
 */

namespace app\api\controller;

use app\api\exception\ParameterException;
use app\api\model\Article;
use app\api\model\Admin;
use libs\mvc\Controller;

class Index extends Controller
{
    protected $beforeActionList = [
        //"index" => "login"
    ];

    public function index()
    {
        $res = (new Admin())->getAllWithRole();
        print_r($res);
    }

    public function login()
    {
//        throw new ParameterException();
        echo date("Y-m-d H:i:s");
        return "前置函数需要执行";
    }

}
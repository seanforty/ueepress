<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/26
 * Time: 7:21
 */

namespace app\admin\controller;

use libs\mvc\Controller;

class Login extends Controller
{
    /*
     * 显示登录界面
     */
    public function index()
    {
        $this->display("login");
    }
}
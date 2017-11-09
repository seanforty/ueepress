<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:04
 */

namespace app\admin\controller;

use libs\Cookie;
use libs\mvc\Controller;
use libs\Request;
use libs\Session;

class BaseController extends Controller
{
    protected $model = null;
    protected $username = "";

    public function __construct()
    {
        $this->defaultLoginCheck();
        $this->baseInfo();
    }

    /*
     * 登录检查
     * @param void
     * @return void
     */
    public function defaultLoginCheck()
    {
        $tokenCookie = Cookie::getCookie("admin_login_token");
        $username    = Cookie::getCookie("admin_login_user");
        $this->username    = Cookie::getCookie("admin_show_user");
        $tokenSession= Session::getSession($username);
        if ( !$username || ($tokenCookie != $tokenSession) ){
            header("Location: ".url(["path"=>"admin/login/index"]));
        }
    }

    /*
     * 绑定基本信息
     * @param void
     * @return void
     */
    public function baseInfo()
    {
        $this->assign("uee_version",UEE_VERSION);
        $this->assign("uee_name",UEE_NAME);
    }
}
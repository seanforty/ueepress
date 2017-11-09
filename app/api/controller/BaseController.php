<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:13
 */

namespace app\api\controller;

use libs\Cookie;
use libs\mvc\Controller;
use libs\Session;

class BaseController extends Controller
{
    protected $model = null;

    /*
     * 登录检查
     * @param void
     * @return void
     */
    public function defaultLoginCheck()
    {
        $tokenCookie = Cookie::getCookie("admin_login_token");
        $username    = Cookie::getCookie("admin_login_user");
        $tokenSession= Session::getSession($username);
        if ( !$username || ($tokenCookie != $tokenSession) ){
            exit( status(false,"未授权") );
        }
    }


}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/3
 * Time: 10:28
 */

namespace app\admin\controller;

use libs\Cookie;
use libs\Session;

class Index extends BaseController
{
    /*
     * 后台管理主页框架
     * @param void
     * @return void
     */
    public function index()
    {
        $this->unread();
        $showUser    = Cookie::getCookie("admin_show_user");
        $this->assign("admin_show_user",$showUser);
        $this->display("index");
    }

    public function unread()
    {
        $commentModel = new \app\api\model\Comment();
        $commentNum = $commentModel->getCount([["type","IN","0,1,2"],["status","=",0]]);
        $messageNum = $commentModel->getCount([["type","=","3"],["status","=",0]]);
        $this->assign("commentNum",$commentNum);
        $this->assign("messageNum",$messageNum);
    }

    public function logout()
    {
        $user = Cookie::getCookie("admin_login_user");
        Session::deleteSession($user);
        Cookie::deleteCookie("admin_login_token");
        Cookie::deleteCookie("admin_login_user");
        Cookie::deleteCookie("admin_show_user");
        $this->display("login");
    }

    /*
     * 后台管理欢迎页面
     * @param void
     * @return void
     */
    public function welcome()
    {
        $user = $this->username;
        $res = (new \app\api\model\Admin())->getBy("title",$user);
        $desktop = [];
        $desktop["uee_version"]   = UEE_VERSION;
        $desktop["uee_name"]      = UEE_NAME;
        $desktop["lastlogintime"] = date("Y-m-d H:i:s",$res[0]["lastlogintime"]);
        $desktop["logintimes"]    = $res[0]["logintimes"];
        $desktop["lastloginip"]   = $res[0]["lastloginip"];

        $desktop["articlenum"] = (new \app\api\model\Article())->getCount(["type","=",1]);
        $desktop["commentnum"] = (new \app\api\model\Comment())->getCount(["type","IN","0,1,2"]);
        $desktop["messagenum"] = (new \app\api\model\Comment())->getCount(["type","=",3]);
        $desktop["adminnum"] =   (new \app\api\model\Admin())->getCount();
        $desktop["rolenum"] = (new \app\api\model\Role())->getCount();

        $this->assign("desktop",$desktop);
        $this->display("welcome");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 9:03
 */
declare(strict_types=1);
namespace app\api\controller;


use app\api\exception\ParameterException;
use app\api\service\Captcha;
use app\libs\validate\LoginValidate;
use libs\Cookie;
use libs\mvc\Controller;
use libs\Request;
use libs\Session;

class Login extends Controller
{
    /*
     * 登录检查
     * @param string username,password,captcha
     * @return string/json
     */
    public function login()
    {
        (new LoginValidate())->goCheck();
        $captcha  = strtolower(Request::post("captcha"));
        $mycaptcha= Session::getSession("ueecmscaptcha");
        if($captcha != $mycaptcha){
            return status(false,"验证码错误！");
        }

        $username = Request::post("username");
        $password = Request::post("password");
        $res = (new Admin())->loginCheck($username,$password);
        if($res["status"]){
            $this->writeToken($username);
        }
        $abc = json($res);
        return $abc;
    }

    /*
     * 登录成功，登录写入session和cookie，禁止外部访问
     * @param string username 用户名
     * @return void
     */
    private function writeToken(string $username):bool
    {
        $token = getToken($username);
        $user = $username . getSalt();
        $bool1 = Session::setSession($user,$token);
        $bool2 = Cookie::setCookie("admin_login_user",$user,7200);
        $bool3 = Cookie::setCookie("admin_login_token",$token,7200);
        $bool4 = Cookie::setCookie("admin_show_user",$username,7200);
        if($bool1 && $bool2 && $bool3 && $bool4){
            (new Admin())->loginRecord($username);
            return true;
        }else{
            throw new ParameterException("登录失败");
        }
    }

    /*
     * 生成验证码
     * @param void
     * @return void
     */
    public function captcha()
    {
        $captcha = new Captcha();
        $captcha->doimg();
        Session::setSession("ueecmscaptcha",$captcha->getCode());
    }

}





















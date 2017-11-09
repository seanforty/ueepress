<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//登录验证
class LoginValidate extends BaseValidate
{
    protected $rules = [
        "username" => ["isChsUsername","isRequired"],
        "password"=>["isPassword","isRequired"],
        "captcha" => ["isRequired"]
    ];

    protected $message = [
        "title"=>"用户名不合法",
        "password"=>"密码不合法",
        "captcha"=>"验证码不存在",
    ];
}
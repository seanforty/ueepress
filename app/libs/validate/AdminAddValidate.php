<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//添加管理员账号验证
class AdminAddValidate extends BaseValidate
{
    protected $rules = [
        "id" => ["isNonNegetiveInt","isRequired"],
        "title"=>["isUsername","isRequired"],
        "password"=>["isPassword"],
        "password2"=>["isPassword"],
        "mobile"=>["isMobile","isRequired"],
        "email"=>["isEmail","isRequired"],
        "role"=>["isNonNegetiveInt","isRequired"],
    ];

    protected $message = [
        "title"=>"用户名不合法",
        "password"=>"密码不合法",
        "password2"=>"密码不合法",
        "mobile"=>"手机号码不合法",
        "email"=>"电子邮箱不合法",
        "role"=>"角色id不合法",
    ];
}
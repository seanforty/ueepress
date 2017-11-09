<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//添加广告图片验证
class MessageAddValidate extends BaseValidate
{
    protected $rules = [
        "name" => ["isRequired"],
        "mobile" => ["isMobile","isRequired"],
        "email" => ["isEmail","isRequired"],
        "title" => ["isRequired"],
        "content" => ["isRequired"]
    ];

    protected $message = [
        "name" => "姓名不能为空！",
        "mobile" => "电话格式不正确或为空！",
        "email" => "邮箱格式不正确或为空！",
        "title" => "标题不能为空！",
        "content" => "内容不能为空！"
    ];
}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//添加广告图片验证
class AdsAddValidate extends BaseValidate
{
    protected $rules = [
        "sid" => ["isNonNegetiveInt"],
        "id" => ["isNonNegetiveInt","isRequired"],
        "img_id" => ["isNonNegetiveInt","isRequired"],
        "listorder" => ["isNonNegetiveInt","isRequired"],
    ];

    protected $message = [
        "sid" => "广告组ID必须为非负整数",
        "id" => "广告图片ID必须为非负整数",
        "img_id" => "图片ID必须为非负整数",
        "target" => "新窗口打开必须为0或1",
        "listorder" => "序号必须为非负整数",
    ];
}
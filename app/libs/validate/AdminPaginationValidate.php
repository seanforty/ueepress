<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//单页码验证
class AdminPaginationValidate extends BaseValidate
{
    protected $rules = [
        "page" => ["isPositiveInt"]
    ];

    protected $message = [
        "page" => "页码数必须为正整数！"
    ];
}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//ID验证，必须为正整数，且不能为空
class MustBePostiveValidate extends BaseValidate
{
    protected $rules = [
        "id" => ["isPositiveInt","isRequired"]
    ];

    protected $message = [
        "id" => "ID必须存在且为正整数"
    ];
}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//ID验证，必须为正整数，但可为空
class MustBePostiveNotRequiredValidate extends BaseValidate
{
    protected $rules = [
        "id" => ["isPositiveInt"]
    ];

    protected $message = [
        "id" => "ID必须为正整数"
    ];
}
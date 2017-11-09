<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//页码验证
class PaginationValidate extends BaseValidate
{
    protected $rules = [
        "pcid"  => ["isPositiveInt","isRequired"],
        "scid"  => ["isPositiveInt"],
        "page" => ["isPositiveInt"]
    ];

    protected $message = [
        "pcid"  => "父分类ID必须存在且为正整数！",
        "scid"  => "子分类ID必须存在且为正整数！",
        "page" => "页码数必须为正整数！"
    ];
}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//更新状态验证
class ListOrderValidate extends BaseValidate
{
    protected $rules = [
        "id" => ["isNonNegetiveInt","isRequired"],
        "listorder" => ["isNonNegetiveInt","isRequired"]
    ];

    protected $message = [
        "id"=>"ID必须存在且为正整数",
        "listorder"=>"顺序号必须存在且为正整数"
    ];
}
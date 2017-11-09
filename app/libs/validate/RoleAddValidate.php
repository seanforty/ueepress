<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//添加角色验证
class RoleAddValidate extends BaseValidate
{
    protected $rules = [
        "id"     => ["isNonNegetiveInt","isRequired"],
        "title"  => ["isChsUsername","isRequired"],
    ];

    protected $message = [
        "id"    => "ID不合法",
        "title" => "角色名不合法",
    ];
}
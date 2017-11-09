<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//添加分类目录验证
class CategoryAddValidate extends BaseValidate
{
    protected $rules = [
        "id"     => ["isNonNegetiveInt","isRequired"],
        "title"  => ["isRequired"],
        "type"   => ["isNonNegetiveInt","isRequired"],
        "parent_id" => ["isNonNegetiveInt"],
        "img_id" => ["isNonNegetiveInt"],
        "listorder" => ["isNonNegetiveInt"]
    ];

    protected $message = [
        "id"     => "ID不合法",
        "title"  => "分类名不合法",
        "parent_id" => "父类ID不合法",
        "img_id" => "图片ID不合法",
        "listorder" => "排序不合法"
    ];
}
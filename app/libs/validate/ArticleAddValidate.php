<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:32
 */

namespace app\libs\validate;

//添加文章验证
class ArticleAddValidate extends BaseValidate
{
    protected $rules = [
        "id" => ["isNonNegetiveInt","isRequired"],
        "title"=>["isRequired"],
        "cate_id"=>["isNonNegetiveInt","isRequired"],
        "img_id"=>["isNonNegetiveInt","isRequired"],
        "read"=>["isNonNegetiveInt","isRequired"],
    ];

    protected $message = [
        "id" => "ID不合法",
        "title"=> "标题不合法",
        "cate_id"=>"分类ID不合法",
        "img_id"=>"缩略图ID不合法",
        "read"=>"阅读数不合法",
        "comment"=>"是否允许评论不合法",
        "stick"=>"是否置顶不合法",
    ];
}
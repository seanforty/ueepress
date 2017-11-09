<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 10:30
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\libs\validate\ArticleAddValidate;

class Product extends BaseController
{

    public function __construct()
    {
        $this->model = new \app\api\model\Product();
    }

    /*
     * 添加文章
     * RequestMethod POST
     * @param id,title,sub_title,content,keyword,description,cate_id,img_id,author,sources,read,comment,stick
     * @return void
     */
    public function add()
    {
        (new ArticleAddValidate())->goCheck();
        $data = Request::postMany(["title","type","slug","price","sales","content","keyword","description","cate_id","img_id","comment","stick"]);
        $data["comment"] = ("on"==$data["comment"])?1:0;
        $data["stick"]   = ("on"==$data["stick"])?1:0;
        $res = $this->model->add($data);
        DBException($res,"添加产品失败");
        return status(true,"添加成功");
    }

}
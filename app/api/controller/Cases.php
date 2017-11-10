<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/20
 * Time: 15:05
 */
declare(strict_types=1);
namespace app\api\controller;

use app\api\exception\ParameterException;
use app\libs\validate\ArticleAddValidate;
use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\StatusValidate;
use libs\Request;

class Cases extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck"
    ];

    public function __construct()
    {
        $this->model = new \app\api\model\Product();
    }

    /*
     * 添加案例
     * RequestMethod POST
     * @param id,title,slug,content,keyword,description,cate_id,img_id,read,comment,stick
     * @return void
     */
    public function add()
    {
        (new ArticleAddValidate())->goCheck();
        $data = Request::postMany(["title","slug","content","keyword","description","img_id","comment","stick"]);
        $data["comment"] = ("on"==$data["comment"])?1:0;
        $data["stick"]   = ("on"==$data["stick"])?1:0;
        $data["type"]    = 2; //案例类型
        $res = $this->model->add($data);
        if(!$res){
            throw new ParameterException("添加文章失败");
        }
        return status(true,"添加成功");
    }

    /*
     * 更新案例
     * RequestMethod POST
     * @param id,title,slug,content,keyword,description,img_id,author,sources,comment,stick
     * @return void
     */
    public function update()
    {
        (new ArticleAddValidate())->goCheck();
        $aid = Request::post("id");
        $data = Request::postMany(["title","sub_title","content","keyword","description","cate_id","img_id","author","sources","read","comment","stick"]);
        $data["stick"] = ("on"==$data["stick"])?"1":"0";
        $data["comment"] = ("on"==$data["comment"])?"1":"0";
        $res = $this->model->updateByID(intval($aid),$data);
        if(!$res){
            throw new ParameterException("更新文章失败");
        }
        return status(true,"更新成功");
    }

}
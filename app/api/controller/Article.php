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

class Article extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck",
        "delete"=>"defaultLoginCheck",
        "deleteAll"=>"defaultLoginCheck",
        "changeStatus"=>"defaultLoginCheck",
        "changeStatus"=>"defaultLoginCheck",
    ];

    public function __construct()
    {
        $this->model = new \app\api\model\Article();
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
        $data = Request::postMany(["title","slug","content","keyword","description","cate_id","img_id","author","sources","read","comment","stick"]);
        $data["comment"] = ("on"==$data["comment"])?1:0;
        $data["stick"]   = ("on"==$data["stick"])?1:0;
        $res = $this->model->add($data);
        if(!$res){
            throw new ParameterException("添加文章失败");
        }
        return status(true,"添加成功");
    }

    /*
     * 更新文章
     * RequestMethod POST
     * @param id,title,sub_title,content,keyword,description,cate_id,img_id,author,sources,read,comment,stick
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

    /*
     * 删除文章
     * RequestMethod POST
     * @param id
     * @return void
     */
    public function delete()
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::post("id");
        $res = $this->model->deleteByID(intval($aid));
        if(!$res){
            throw new ParameterException("删除文章失败");
        }
        return status(true,"删除成功");
    }

    /*
     * 批量删除
     * RequestMethod POST
     * @param string ids
     * @return void
     */
    public function deleteAll()
    {
        $ids = Request::post("ids");
        $res = $this->model->delete(["id","IN",$ids]);
        if(!$res){
            throw new ParameterException("批量删除失败");
        }
        return status(true,"删除成功");
    }

    /*
     * 修改状态
     * RequestMethod POST
     * @param id, status
     * @return void
     */
    public function changeStatus()
    {
        (new StatusValidate())->goCheck();
        $statusId = Request::post("status");
        $id = Request::post("id");
        $res = $this->model->updateByID(intval($id),["status"=>$statusId]);
        if(!$res){
            throw new ParameterException("状态修改失败");
        }
        return status(true,"状态成功");
    }
}
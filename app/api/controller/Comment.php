<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25
 * Time: 13:22
 */
declare(strict_types=1);
namespace app\api\controller;


use app\api\exception\ParameterException;
use app\libs\validate\MessageAddValidate;
use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\StatusValidate;
use libs\Request;

class Comment extends BaseController
{
    protected $beforeActionList = [
        "delete"=>"defaultLoginCheck",
        "deleteAll"=>"defaultLoginCheck",
        "changeStatus"=>"defaultLoginCheck",
    ];

    public function __construct()
    {
        $this->model = new \app\api\model\Comment();
    }

    /*
     * 删除评论
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
            throw new ParameterException("删除失败");
        }
        return status(true,"删除成功");
    }

    /*
     * 批量评论
     * RequestMethod POST
     * @param string ids
     * @return void
     */
    public function deleteAll()
    {
        $ids = Request::post("ids");
        $res = $this->model->delete(["id","IN",'('.$ids.')']);
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
        return status(true,"状态修改成功");
    }

    /*
     * 保存留言
     * RequestMethod POST
     * @param name,mobile,email,title,content
     * @return void
     */
    public function saveMessage()
    {
        (new MessageAddValidate())->goCheck();
        $data = Request::postMany(["name","mobile","email","title","content"]);
        $data["type"] = 3;
        $res = $this->model->add($data);
        DBException($res,"保存留言失败！");
        return status(true,"留言已提交！");
    }
}
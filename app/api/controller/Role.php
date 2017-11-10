<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:13
 */
declare(strict_types=1);
namespace app\api\controller;

use app\api\exception\DataDeleteException;
use app\api\exception\RoleAddException;
use app\api\model\Role as RoleModel;
use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\RoleAddValidate;
use libs\Request;

class Role extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck",
    ];

    public $model;
    public function __construct()
    {
        $this->model = new RoleModel();
    }

    /*
     * 添加管理员角色
     * RequestMethod POST
     * @param id, title, remark
     * @return string/json
     */
    public function add()
    {
        (new RoleAddValidate())->goCheck();
        $data = array();
        $data["title"]  = Request::post("title");
        $data["remark"] = Request::post("remark");
        $res = $this->model->add($data);
        if(!$res){
            throw new RoleAddException("添加管理员角色失败!");
        }
        return json(["status"=>true,"msg"=>"新增管理员角色成功"]);
    }

    /*
     * 已知ID更新管理员角色数据
     * RequestMethod: POST
     * @param id / title / remark
     * @return string/json
     */
    public function update()
    {
        (new RoleAddValidate())->goCheck();
        $data = array();
        $rid = Request::post("id");
        $data["title"]  = Request::post("title");
        $data["remark"] = Request::post("remark");
        $res = $this->model->updateByID(intval($rid),$data);
        if($res){
            $msg = "更新成功";
        }else{
            $msg = "未更新";
        }
        return status(true,$msg);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/19
 * Time: 7:35
 */
declare(strict_types=1);
namespace app\api\controller;

use app\api\exception\ParameterException;
use app\libs\validate\CategoryAddValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Log;
use libs\Request;

class Category extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck",
        "delete"=>"defaultLoginCheck",
        "changeListOrder"=>"defaultLoginCheck"
    ];

    public function __construct()
    {
        $this->model = new \app\api\model\Category();
    }

    /*
     * 添加并保存分类
     * RequestMethod POST
     * @param id,title,parent_id,description,img_id,listorder
     * @return string/json
     */
    public function add()
    {
        (new CategoryAddValidate())->goCheck();
        $data = Request::postMany(["id","title","parent_id","listorder","img_id","description"]);
        $res = $this->model->add($data);
        if(!$res){
            throw new ParameterException("分类目录添加失败");
        }
        return status(true,"添加成功");
    }

    /*
     * 更新分类目录
     * RequestMethod POST
     * @param title,parent_id,listorder,img_id,description
     * @return string/json
     */
    public function update()
    {
        (new CategoryAddValidate())->goCheck();
        $data = Request::postMany(["title","parent_id","listorder","img_id","description"]);
        $cid = intval(Request::post("id"));
        $res = $this->model->updateByID($cid,$data);
        if($res){
            return status(true,"更新成功");
        }else{
            return status(false,"未更新");
        }
    }

    /*
     * 删除分类目录
     * RequestMethod POST
     * @param id
     * @return void
     */
    public function delete()
    {
        (new MustBePostiveValidate())->goCheck();
        $cid = intval( Request::post("id") );
        $res = $this->model->deleteByID($cid);
        if(!$res){
            throw new ParameterException("删除分类失败");
        }
        return status(true,"删除成功");
    }

    /*
     * 批量删除记录
     * @param void
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
     * 修改排序
     * RequestMethod POST
     * @param int listorder
     * @return void
     */
    public function changeListOrder()
    {
        $id = Request::post("id");
        $listorder = Request::post("listorder");
        $res = $this->model->updateByID(intval($id),["listorder"=>$listorder]);
        if(!$res){
            throw new ParameterException("更新失败");
        }
        return status(true,"更新成功");
    }
}
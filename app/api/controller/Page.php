<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/21
 * Time: 5:00
 */
declare(strict_types=1);
namespace app\api\controller;


use app\api\exception\ParameterException;
use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\PageAddValidate;
use libs\Request;

class Page extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck",
        "delete"=>"defaultLoginCheck",
    ];

    public function __construct()
    {
        $this->model = new \app\api\model\Page();
    }

    /*
     * 添加页面
     */
    public function add()
    {
        (new PageAddValidate())->goCheck();
        $data = Request::postMany(["title","sub_title","listorder","keyword","description","comment","img_id","content","read"]);
        $res = $this->model->add($data);
        if(!$res){
            throw new ParameterException("添加页面失败");
        }
        return status(true,"添加页面成功");
    }

    /*
     * 更新页面
     */
    public function update()
    {
        (new PageAddValidate())->goCheck();
        $pid = Request::post("id");
        $data = Request::postMany(["title","sub_title","listorder","keyword","description","comment","img_id","content","read"]);
        $res = $this->model->updateByID(intval($pid),$data);
        if(!$res){
            throw new ParameterException("更新页面失败");
        }
        return status(true,"更新页面成功");
    }

    /*
     * 删除页面
     */
    public function delete()
    {
        (new MustBePostiveValidate())->goCheck();
        $pid = Request::post("id");
        $res = $this->model->deleteByID(intval($pid));
        if(!$res){
            throw new ParameterException("删除页面失败");
        }
        return status(true,"删除页面成功");
    }
}
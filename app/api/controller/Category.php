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
        "update"=>"defaultLoginCheck"
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
        $data = Request::postMany(["id","type","title","parent_id","listorder","img_id","description"]);
        $res = $this->model->add($data);
        DBException($res,"添加分类失败");
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

}
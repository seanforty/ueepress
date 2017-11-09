<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/11/9
 * Time: 4:22
 */
declare(strict_types=1);
namespace app\api\controller;

use app\libs\validate\MustBePostiveValidate;
use Couchbase\MatchNoneSearchQuery;
use libs\Request;

class Link extends BaseController
{
    public function __construct()
    {
        $this->model = new \app\api\model\Link();
    }

    /*
     * 添加友链
     * RequestMethod Post
     */
    public function add()
    {
        $data = Request::postMany(["title","url","target","description"]);
        $data["target"] = $data["target"]?1:0;
        $res = $this->model->add($data);
        DBException($res,"添加友链失败！");
        return status(true,"添加友链成功！");
    }

    /*
     * 删除友链
     * RequestMethod POST
     */
    public function delete()
    {
        (new MustBePostiveValidate())->goCheck();
        $id = Request::post("id");
        $res = $this->model->deleteByID(intval($id));
        DBException($res,"删除友链失败！");
        return status(true,"删除友链成功！");
    }

    /*
     * 批量删除友链
     */
    public function deleteAll()
    {
        $ids = Request::post("ids");
        $res = $this->model->delete(["id","in",$ids]);
        DBException($res,"批量删除失败！");
        return status(true,"批量删除成功！");
    }

}
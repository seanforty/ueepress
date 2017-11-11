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
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck"
    ];

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
     * 更新成功
     * RequestMethod post
     * @param int id
     * @reutrn string
     */
    public function update()
    {
        $id = Request::post("id");
        $data = Request::postMany(["title","url","target","img_id","description"]);
        $res = $this->model->updateByID(intval($id),$data);
        DBException($res,"更新失败！");
        return status(true,"更新成功！");
    }

}
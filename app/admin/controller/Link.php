<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/11/9
 * Time: 4:21
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\libs\validate\AdminPaginationValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Link extends BaseController
{
    public function __construct()
    {
        $this->model = new \app\api\model\Link();
        parent::__construct();
    }

    /*
     * 链接列表页面
     * RequestMethod GET
     * @param int page
     */
    public function getList()
    {
        (new AdminPaginationValidate())->goCheck();
        $page = Request::get("page");
        if(!$page){
            $page = 1;
        }
        $res = $this->model->pagination($page);
        $this->assign("res",$res);
        $this->display("link-list");
    }

    /*
     * 添加友情链接
     */
    public function add()
    {
        $this->display("link-add");
    }

    /*
     * 编辑友情链接
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $id = Request::get("id");
        $res = $this->model->getWithImg(intval($id));
        DBException($res,"指定友情链接不存在！");
        $this->assign("res",$res);
        $this->display("link-update");
    }

}
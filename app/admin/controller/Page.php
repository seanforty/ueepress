<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/21
 * Time: 5:00
 */
declare(strict_types=1);
namespace app\admin\controller;


use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\PageAddValidate;
use libs\Request;

class Page extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Page();
    }

    /*
     * 获取页面列表
     */
    public function getList()
    {
        $res = $this->model->find();
        $this->assign("res",$res);
        $this->display("page-list");
    }

    /*
     * 添加页面
     */
    public function add()
    {
        $this->display("page-add");
    }

    /*
     * 更新页面
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $pid = Request::get("id");
        $res = $this->model->getOnePage(intval($pid));
        if(!$res){
            throw new ParameterException("页面不存在");
        }
        $this->assign("res",$res);
        $this->display("page-update");
    }

}
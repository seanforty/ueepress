<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 10:30
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\libs\validate\AdminPaginationValidate;
use libs\Request;

class Product extends BaseController
{
    public function __construct()
    {
        $this->model = new \app\api\model\Product();
        parent::__construct();
    }

    /*
     * 显示产品列表页
     * @param int ptype 内容类型
     * @param int ctype 分类类型
     * @param string template
     * @return void
     */
    public function getList(string $template,int $ptype,int $ctype=1)
    {
        (new AdminPaginationValidate())->goCheck();
        $pageNum = Request::get("page");
        if(!$pageNum){
            $pageNum = 1;
        }else{
            $pageNum = intval($pageNum);
        }

        $where = $this->getWhere($ptype);
        $order = [["create_time","DESC"],["id","DESC"]];
        $res = $this->model->pagination($pageNum,$where,$order);
        $menuStr = $this->getMenuStr($ctype);
        $this->assign("res",$res); //产品列表
        $this->assign("menustr",$menuStr); //分类下拉菜单
        $this->display($template);
    }

    /*
     * 产品添加页面
     * @param string template
     * @return void
    */
    public function addPro(string $template,int $ctype)
    {
        $menuStr = $this->getMenuStr($ctype);
        $this->assign("menustr",$menuStr);
        $this->display($template);
    }

    /*
     * 产品编辑更新页面
     * @param string template
     * @return void
     */
    public function updatePro(string $template)
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::get("id");
        $res = $this->model->getArticles(["id","=",$aid]);
        if(!$res){
            throw new ParameterException("该文章不存在");
        }
        $menuStr = $this->getMenuStr(intval($res[0]["cate_id"]));
        $this->assign("menustr",$menuStr);
        $this->assign("res",$res[0]);
        $this->display($template);
    }

}
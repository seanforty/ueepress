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
use app\libs\validate\MustBePostiveValidate;
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
     * @param int ptype 内容类型 1为产品 2为案例
     * @param int ctype 分类类型 1为文章 2为产品
     * @param string template
     * @return void
     */
    protected function getList(string $template,int $ptype=1,int $ctype=2,bool $isCate=true)
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
        $this->assign("res",$res); //产品列表

        if($isCate){
            $menuStr = $this->getMenuStr($ctype);
            $this->assign("menustr",$menuStr); //分类下拉菜单
        }

        $this->display($template);
    }

    /*
     * 产品添加页面
     * @param string template
     * @return void
    */
    public function addPro(string $template,int $ctype,bool $isCate=true)
    {
        if($isCate){
            $menuStr = $this->getMenuStr($ctype);
            $this->assign("menustr",$menuStr);
        }
        $this->display($template);
    }

    /*
     * 产品编辑更新页面
     * @param string template
     * @param int ctype   2:产品分类
     * @return void
     */
    public function updatePro(string $template,int $ctype=2)
    {
        (new MustBePostiveValidate())->goCheck();
        $id = Request::get("id");
        $res = $this->model->get(intval($id));
        DBException($res,"该文章不存在");
        $images = (new \app\api\model\Image())->find(["id","IN",$res["imgs"]]);
        $res["image"] = $images;

        $menuStr = $this->getMenuStr($ctype,intval($res["cate_id"]));
        $this->assign("menustr",$menuStr);
        $this->assign("res",$res);
        $this->display($template);
    }

}
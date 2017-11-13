<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/2
 * Time: 11:05
 */
declare(strict_types=1);
namespace app\index\controller;

use app\api\service\Breadcrumb;
use app\api\service\Pagination;
use app\libs\validate\PaginationValidate;
use libs\Request;

class Category extends BaseController
{
    protected $categoryObj = null;
    protected $contentObj = null;

    public function __construct()
    {
        $this->categoryObj = new \app\api\model\Category();
        parent::__construct();
    }

    /*
     * 分类列表页面
     * @param string template 模板
     * @param int page 页码
     * @param int cid 分类ID
     * @param int type article中1-文章类型 2-页面类型，product中1-产品类型 2-案例类型
     * @param int ctype 1-文章分类 2-产品分类
     */
    public function indexBase(string $template,int $page = 0, int $cid = 0,int $type=1,int $ctype=1)
    {
        $validRes = $this->validate($page,$cid);
        $page = $validRes[0];
        $cid  = $validRes[1];

        //查询文章列表
        $list = $this->getListByCate(intval($cid), intval($page),$type);
        $this->assign("list", $list);

        $this->breadCrumb($template,$cid);
        $this->getPagination($list,$cid,$template);
        $this->sideNav($template);

        $this->display($template);
    }

    /*
     * 验证传入参数
     * @param int page
     * @param int cid
     */
    protected function validate(int $page,int $cid)
    {
        $validateArr = [];
        if ($page) {
            $validateArr[] = ["page" => $page];
            $page = intval($page);
        } else {
            $page = Request::get("page")?int(Request::get("page")):1;
        }
        if ($cid) {
            $validateArr = ["cid" => $cid];
            $cid = $intval($cid);
        }else{
            $cid = Request::get("id")?intval(Request::get("id")):0;
        }
        (new PaginationValidate())->goCheck($validateArr);
        return [$page,$cid];
    }

    /*
     * 显示左侧导航
     */
    protected function sideNav(string $template)
    {
        switch ($template){
            case "pc/case":      $mid = 6;$title="产品目录";break;
            case "pc/pcategory": $mid = 6;$title="产品目录";break;
            case "pc/acategory": $mid = 9;$title="资讯文章";break;
        }

        $side = $this->sideMenu($mid);
        $this->assign("side",$side);
        $this->assign("sidetitle",$title);
    }

    /*
     * 显示分页
     * @param array list 通过分页获取的数组
     */
    protected function getPagination(array $list,int $id,string $template)
    {
        switch ($template){
            case "pc/case":      $url = ["path"=>"index/cases/index"];break;
            case "pc/pcategory": $url = ["path"=>"index/pcategory/index"];break;
            case "pc/acategory": $url = ["path"=>"index/acategory/index"];break;
        }

        if(0!=$id){
            $url["params"] = ["id"=>$id];
        }

        $pagination = new Pagination($url,intval($list["pagination"]["totalpage"]), intval($list["pagination"]["currentpage"]));
        $pageStr = $pagination->render();
        $this->assign("pagestr", $pageStr);
    }

    /*
     * 显示面包屑导航
     * @param string template
     * @param int cid
     */
    protected function breadCrumb(string $template,int $cid)
    {
        switch ($template){
            case "pc/case":      $controller = "index/cases/index"    ;$crumbtitle="客户案例";break;
            case "pc/pcategory": $controller = "index/pcategory/index";$crumbtitle="";break;
            case "pc/acategory": $controller = "index/acategory/index";$crumbtitle="";break;
        }
        $crumbStr = (new Breadcrumb())->render($controller,$cid,$crumbtitle);
        $this->assign("crumbstr", $crumbStr);
    }

    /*
     * 依据分类获取记录列表
     * @param int cid
     * @param int page
     * @param int ctype
     * @return array
     */
    protected function getListByCate(int $cid=0,int $page=1,int $ctype=1):array
    {
        if($cid){
            $cidStr = $cid;
            $cates = $this->getSubCates($cid);
            if($cates){
                $cidStr .= ",".implode(",",array_column($cates,"id"));
            }
            $where = [ ["type","=",$ctype], ["cate_id","IN",$cidStr] ];
        }else{
            $where = [ "type","=",$ctype ];
        }
        $order = ["id","DESC"];
        $res = $this->contentObj->pagination($page,$where,$order);
        return $res;
    }

    /*
     * 返回给定分类的下所有子孙分类
     * @param int cid 分类ID
     * @param bool recursion 默认递归
     * @param array list 引用数组，在递归过程中传递返回值
     * @return array
     */
    protected function getSubCates(int $cid=0,array &$list=[]):array
    {
        $res = $this->categoryObj->getBy("parent_id",strval($cid));
        if($res){
            $list = array_merge($list,$res);
            foreach($res as $v){
                $this->getSubCates(intval($v["id"]),$list);
            }
        }
        return $list;
    }
}
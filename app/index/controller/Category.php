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
    protected $artcileObj  = null;

    public function __construct()
    {
        $this->categoryObj = new \app\api\model\Category();
        $this->artcileObj  = new \app\api\model\Article();
        parent::__construct();
    }

    /*
     * 分类页面
     * /index/category?pcid=15&scid=16&page=1
     * @param int pcid 父级分类ID，必须
     * @param int scid 子级分类ID，可选
     * @param int page 页码，可选
     */
    public function index($pcid="",$scid="",$page="")
    {
        if(""===$pcid){
            (new PaginationValidate())->goCheck();
            $pcid = Request::get("pcid");
            $scid = Request::get("scid");
            $page = Request::get("page");
        }

        if(!$page){
            $page = 1;
        }

        //子菜单
        $subMenu = $this->getSubMenu(intval($pcid));
        if($subMenu){
            $this->assign("submenu",$subMenu);
            $this->assign("pcid",$pcid);
            if($scid){
                $this->assign("scid",$scid);
            }
        }

        //查询文章列表
        $cid = $scid?$scid:$pcid;
        $articleList = $this->getArticleByCate(intval($cid),intval($page));
        $this->assign("articlelist",$articleList);

        //面包屑导航
        $crumbStr = (new Breadcrumb())->render($this->getController(),intval($cid));
        $this->assign("crumbstr",$crumbStr);

        //分页
        $pagination = new Pagination(intval($articleList["pagination"]["totalpage"]),intval($articleList["pagination"]["currentpage"]));
        $pageStr = $pagination->render();
        $this->assign("pagestr",$pageStr);

        $this->display("pc/category");
    }

    /*
     * 返回指定分类组下所记录
     * @param string cid 分类ID
     * @param int page 页码
     * @return array
     */
    protected function getArticleByCate(int $cid,int $page):array
    {
        $cateList = $this->getSubCates(intval($cid));
        $cateIds  = $this->getCateIds($cateList);
        if($cateIds){
            $cateIds .= ",".strval($cid);
        }else{
            $cateIds .= strval($cid);
        }
        $articleList = $this->artcileObj->pagination(intval($page),["cate_id","IN",$cateIds],["id","DESC"]);
        return $articleList;
    }

    /*
     * 获取子分类作为菜单（只支持二级分类）
     * @param int pcid 当前分类
     * @return array
     */
    public function getSubMenu(int $pcid):array
    {
        $subCates = $this->getSubCates($pcid);
        if(!$subCates){
            $ids = strval($pcid);
        }else{
            $ids = $this->getCateIds($subCates);
        }
        $res = $this->categoryObj->find(["id","IN",$ids],["listorder","DESC"]);
        DBException($res,"该分类不存在！");
        return $res;
    }

    /*
     * 返回给定分类的子孙分类的ID组成的字符串,如"1,3,5,6,7"
     * @param int cateList 分类记录组成的数组
     * @return string
     */
    protected function getCateIds(array $cateList):string
    {
        $strIds = [];
        foreach($cateList as $v){
            $strIds[] = $v["id"];
        }
        return implode(",",$strIds);
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
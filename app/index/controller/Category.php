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
     * @param int ctype 1-文章分类 1-产品分类 2-案例列表
     */
    public function indexBase(string $template,int $page = 0, int $cid = 0,int $ctype=1)
    {
        $validateArr = [];
        if ($page) {
            $validateArr[] = ["page" => $page];
        } else {
            $page = 1;
        }
        if ($cid) {
            $validateArr = ["cid" => $cid];
        }
        (new PaginationValidate())->goCheck($validateArr);

        //查询文章列表
        $list = $this->getListByCate(intval($cid), intval($page));
        $this->assign("list", $articleList);

        //面包屑导航
        $crumbStr = (new Breadcrumb())->render($this->getController(), intval($cid));
        $this->assign("crumbstr", $crumbStr);

        //分页
        $pagination = new Pagination(intval($articleList["pagination"]["totalpage"]), intval($articleList["pagination"]["currentpage"]));
        $pageStr = $pagination->render();
        $this->assign("pagestr", $pageStr);

        $this->display($template);
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
            $cids = $this->getSubCates($cid);
            if($cids){
                $cidStr .= ",".implode(",",$cids);
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
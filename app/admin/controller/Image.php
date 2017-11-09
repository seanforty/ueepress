<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:03
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\api\exception\ParameterException;
use app\api\model\Image as ImageModel;
use app\api\service\CategoryDropdownList;
use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\AdminPaginationValidate;
use libs\Request;

class Image extends BaseController
{
    public function __construct()
    {
        $this->model = new ImageModel();
        parent::__construct();
    }

    /*
     * 文章列表页面
     * RequestMethod POST
     * @param int page 页码，正整数
     * @return void
     */
    public function getList(){
        (new AdminPaginationValidate())->goCheck();
        $pageNum = Request::get("page");
        if(!$pageNum){
            $pageNum = 1;
        }else{
            $pageNum = intval($pageNum);
        }

        $order = [["create_time","DESC"],["id","DESC"]];
        $res = $this->model->pagination($pageNum,[],$order);
        $this->imageCheck($res["data"]);
        $this->assign("res",$res);
        $this->display("image-list");
    }

    public function imageCheck(array &$data)
    {
        foreach($data as &$v){
            $v["use"] = $this->useChecker(intval($v["id"]));
        }
    }

    /*
     * 查看该图片否被被引用
     * @param int id 图片ID
     * @return json
     */
    public function useChecker(int $id=0)
    {
        $res = $this->model->get($id);
        DBException($res,"该图片不存在！");

        $useInfo = [];
        $id = strval($id);

        //文章引用
        $articleUse = (new \app\api\model\Article())->getBy("img_id",$id);
        //分类引用
        $categoryUse = (new \app\api\model\Category())->getBy("img_id",$id);
        //管理后台菜单引用
        $menuUse = (new \app\api\model\Menusite())->getBy("img_id",$id);
        //菜单引用
        $menucontentUse = (new \app\api\model\Menucontent())->getBy("img_id",$id);
        //页面引用
        $pageUse = (new \app\api\model\Page())->getBy("img_id",$id);
        //广告引用
        $adUse = (new \app\api\model\Sliderimg())->getBy("img_id",$id);

        if($articleUse)
            $useInfo[] = "文章";
        if($categoryUse)
            $useInfo[] = "分类";
        if($menuUse)
            $useInfo[] = "后台菜单";
        if($menucontentUse)
            $useInfo[] = "前台菜单";
        if($pageUse)
            $useInfo[] = "页面";
        if($adUse)
            $useInfo[] = "广告";
        $useStr = implode(",",$useInfo);

        return $useStr;
    }

    /*
     * 获取搜索查询条件
     * RequestMethod POST
     * @param string keyword,logmin,logmax 搜索关键词，最小日期，最大日期
     * @return void
     */
    public function getWhere():array
    {
        $where = [];
        $keyword = Request::get("keyword");
        if($keyword){
            $where[] = ["title","like","%".$keyword."%"];
        }

        $categoryId = Request::get("categoryid");
        if($categoryId){
            $where[] = ["cate_id","=",$categoryId];
        }

        $logMax = Request::get("logmax");
        if($logMax){
            $where[] = ["create_time","<",$logMax];
        }

        $logMin = Request::get("logmin");
        if($logMin){
            $where[] = ["create_time",">",$logMin];
        }
        return $where;
    }

    /*
     * 文章添加页面
     * @param void
     * @return void
     */
    public function add()
    {
        $menuStr = $this->getMenuStr();
        $this->assign("menustr",$menuStr);
        $this->display("article-add");
    }

    /*
     * 文章编辑更新页面
     * @param void
     * @return void
     */
    public function update()
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
        $this->display("article-update");
    }

    /*
     * 获取分类目录下拉菜单代码
     * @param void
     * @return void
     */
    protected function getMenuStr(int $cid=0)
    {
        $data = (new \app\api\model\Category())->find();
        $menuStr = (new CategoryDropdownList($data))->menuTree(0,$cid,true);
        return $menuStr;
    }
}
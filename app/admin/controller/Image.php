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
        $productUse = (new \app\api\model\Product())->getBy("img_id",$id);
        //文章引用
        $articleUse = (new \app\api\model\Article())->getBy("img_id",$id);
        //分类引用
        $categoryUse = (new \app\api\model\Category())->getBy("img_id",$id);
        //管理后台菜单引用
        $menuUse = (new \app\api\model\Menulist())->getBy("img_id",$id);
        //菜单引用
        $menucontentUse = (new \app\api\model\Menucontent())->getBy("img_id",$id);
        //页面引用
        $pageUse = (new \app\api\model\Page())->getBy("img_id",$id);
        //广告引用
        $adUse = (new \app\api\model\Sliderimg())->getBy("img_id",$id);

        if($productUse)
            $useInfo[] = "产品";
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
        DBException($res,"图片不存在！");
        $menuStr = $this->getMenuStr(4,intval($res[0]["cate_id"]));
        $this->assign("menustr",$menuStr);
        $this->assign("res",$res[0]);
        $this->display("article-update");
    }

}
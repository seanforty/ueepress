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
use app\libs\validate\ArticleListValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Product extends BaseController
{
    public function index(int $id=0)
    {
        $id = $this->validate($id);

        //产品
        $productModel = new \app\api\model\Product();
        $res = $productModel->getWithMultiImg(intval($id));
        DBException($res,"此页面不存在！");
        $this->assign("res",$res);

        //产品所属分类
        $cid = intval($res["cate_id"]);

        //面包屑导航
        $crumbStr = (new Breadcrumb())->render("product",intval($res["cate_id"]),$res["title"]);
        $this->assign("crumbstr", $crumbStr);

        //侧边栏
        $side = $this->sideMenu(6);
        $this->assign("side",$side);
        $this->assign("sidetitle","产品目录");

        $this->recommendPro();

        $this->display("pc/psingle");
    }

    /*
     * 验证传入id
     * @param int id
     * @return int id
     */
    protected function validate(int $id)
    {
        if(0==$id){
            (new MustBePostiveValidate())->goCheck();
            $id = Request::get("id")?intval(Request::get("id")):0;
        }else{
            $id = intval($id);
            (new MustBePostiveValidate())->goCheck(["id"=>$id]);
        }
        return $id;
    }

    /*
     * 获取一级分类（默认传入二级分类ID)
     * @param scid
     */
    protected function getTopCate(int $scid):int
    {
        $res = (new \app\api\model\Category())->get($scid);
        if(0 == $res["parent_id"]){
            return $scid;
        }else{
            return intval($res["parent_id"]);
        }
    }
}
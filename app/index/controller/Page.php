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
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Page extends BaseController
{
    public function index(int $id=0)
    {
        $id = $this->validate($id);

        $pageModel = new \app\api\model\Article();
        $res = $pageModel->getWithImg(intval($id));
        DBException($res,"此页面不存在！");
        $this->assign("res",$res);

        //面包屑导航
        $crumbStr = (new Breadcrumb())->render("index/page/index",$id,$res["title"]);
        $this->assign("crumbstr", $crumbStr);

        //标准带侧栏 standard
        if(0==$res["type2"]){
            $this->sideNav();

            $this->recommendPro();
            $this->display("pc/page");
        }elseif(1==$res["type2"]){  //全宽度 fullwidth
            $this->display("pc/page-fullwidth");
        }
    }

    /*
     * 显示左侧导航
     */
    protected function sideNav()
    {
        $side = $this->sideMenu(7);
        $this->assign("side",$side);
        $this->assign("sidetitle","关于我们");
    }

    protected function validate(int $id):int
    {
        if(0==$id){
            (new MustBePostiveValidate())->goCheck();
            $id = Request::get("id")?intval(Request::get("id")):0;
        }else{
            $id = $id;
            (new MustBePostiveValidate())->goCheck(["id"=>$pid]);
        }
        return $id;
    }
}
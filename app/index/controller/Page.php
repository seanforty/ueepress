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
    public function index(string $id="")
    {
        if(""!==$id){
            $pid = $id;
            (new MustBePostiveValidate())->goCheck(["id"=>$pid]);
        }else{
            (new MustBePostiveValidate())->goCheck();
            $pid = Request::get("id");
        }

        $pageModel = new \app\api\model\Article();
        $res = $pageModel->getWithImg(intval($pid));
        DBException($res,"此页面不存在！");
        $this->assign("res",$res);

        //面包屑导航
        $crumbStr = (new Breadcrumb())->render("index/page/index",intval($pid),"");
        $this->assign("crumbstr", $crumbStr);

        if(0==$res["type2"]){   //标准带侧栏 standard
            $side = $this->sideMenu(3);
            $this->assign("side",$side);
            $this->assign("sidetitle","关于我们");

            $this->recommendPro();
            $this->display("pc/page");
        }elseif(1==$res["type2"]){  //全宽度 fullwidth
            $this->display("pc/page-fullwidth");
        }
    }
}
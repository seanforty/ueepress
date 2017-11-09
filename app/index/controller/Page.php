<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/2
 * Time: 11:05
 */
declare(strict_types=1);
namespace app\index\controller;

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

        $pageModel = new \app\api\model\Page();
        $res = $pageModel->getOnePage(intval($pid));
        DBException($res,"此页面不存在！");
        $this->assign("res",$res);
        $this->display("pc/page");
    }
}
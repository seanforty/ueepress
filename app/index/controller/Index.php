<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/3
 * Time: 10:28
 */
declare(strict_types=1);
namespace app\index\controller;

use app\api\model\Product;

class Index extends BaseController
{
    public function __construct()
    {
        $this->model = new Product();
        parent::__construct();
    }

    /*
     * 显示首页
     * @param void
     * @return void
     */
    public function index(){
        $this->getCase();
        $this->getService();
        $this->display("pc/index");
    }

    /*
     * 获取案例
     * @param void
     * @return void
     */
    protected function getCase()
    {
        $res = $this->model->pagination(1,["type","=","2"],["id","DESC"]);
        if( isset($res["data"]) ){
            $this->assign("cases",$res["data"]);
        }else{
            $this->assign("cases",[]);
        }
    }

    /*
     * 获取模块一信息
     * @param void
     * @return void
     */
    protected function getService()
    {
        $service = [];
        $service["indexmodule1_title"] = $this->siteInfo->getValueByKey("indexmodule1_title");
        $service["indexmodule1_subtitle"] = $this->siteInfo->getValueByKey("indexmodule1_subtitle");
        $service["indexmodule1_content"] = $this->siteInfo->getValueByKey("indexmodule1_content");
        $this->assign("indexmodule1",$service);
    }

}
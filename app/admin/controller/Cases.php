<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:03
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\libs\validate\AdminPaginationValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Cases extends BaseController
{
    public function __construct()
    {
        $this->model = new \app\api\model\Product();
    }

    /*
     * 案例列表页面
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

        $where = ["type","=",2]; //type=2 案例
        $order = [["create_time","DESC"],["id","DESC"]];
        $res = $this->model->pagination($pageNum,$where,$order);
        $this->assign("res",$res);
        $this->display("case-list");
    }

    /*
     * 案例添加页面
     * @param void
     * @return void
     */
    public function add()
    {
        $this->display("case-add");
    }

    /*
     * 案例编辑更新页面
     * @param void
     * @return void
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $id = Request::get("id");
        $res = $this->model->getOneRecord(intval($id));
        DBException($res,"该文章不存在");
        $this->assign("res",$res);
        $this->display("case-update");
    }

}
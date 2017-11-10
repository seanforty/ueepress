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

class Cases extends Product
{
    /*
    * 显示案例列表页
    */
    public function index()
    {
        $this->getList("case-list",2,2,false);
    }
    /*
     * 显示案例添加页面
     */
    public function add()
    {
        $this->addPro("case-add",2,false);
    }
    /*
     * 显示案例编辑页面
     */
    public function update()
    {
        $this->updatePro("case-update");
    }

}
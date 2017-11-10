<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 10:30
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\libs\validate\AdminPaginationValidate;
use libs\Request;

class Products extends Product
{
    /*
     * 显示产品列表页
     */
    public function index()
    {
        $this->getList("product-list",1,2);
    }
    /*
     * 显示产品添加页面
     */
    public function add()
    {
        $this->addPro("product-add",2);
    }
    /*
     * 显示产品编辑页面
     */
    public function update()
    {
        $this->updatePro("product-update");
    }



}
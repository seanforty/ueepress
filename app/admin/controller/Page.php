<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/21
 * Time: 5:00
 */
declare(strict_types=1);
namespace app\admin\controller;


use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\PageAddValidate;
use libs\Request;

class Page extends Article
{
    /*
     * 显示文章列表页
     */
    public function index()
    {
        $this->getList("page-list",2,2,false);
    }
    /*
     * 显示文章添加页面
     */
    public function add()
    {
        $this->addArt("page-add",2,false);
    }
    /*
     * 显示文章编辑页面
     */
    public function update()
    {
        $this->updateArt("page-update",2,false);
    }
}
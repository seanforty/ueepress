<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:03
 */
declare(strict_types=1);
namespace app\admin\controller;

class Articles extends Article
{
    /*
     * 显示文章列表页
     */
    public function index()
    {
        $this->getList("article-list",1,2);
    }
    /*
     * 显示文章添加页面
     */
    public function add()
    {
        $this->addArt("article-add",1);
    }
    /*
     * 显示文章编辑页面
     */
    public function update()
    {
        $this->updateArt("article-update",1);
    }
}
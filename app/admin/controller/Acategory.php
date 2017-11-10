<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:03
 */
declare(strict_types=1);
namespace app\admin\controller;

class Acategory extends Category
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = $this->model->find(
        ["type","=","1"], [
            ["listorder","DESC"],
            ["id","DESC"]
        ]);
    }

    /*
     * 显示分类列表
     */
    public function index()
    {
        $this->getList("acategory-list");
    }
    /*
     * 显示添加页面
     */
    public function add()
    {
        $this->addCate("acategory-add");
    }

    /*
     * 显示编辑页面
     */
    public function update()
    {
        $this->updateCate("acategory-update");
    }


}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:03
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\api\exception\ParameterException;
use app\api\model\Category as CategoryModel;
use app\api\service\AdminCategoryMenu;
use app\api\service\CategoryDropdownList;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Pcategory extends Category
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = $this->model->find(
        ["type","=","2"], [
            ["listorder","DESC"],
            ["id","DESC"]
        ]);
    }

    /*
     * 显示产品分类
     */
    public function index()
    {
        $this->getList("pcategory-list");
    }
    /*
     * 显示添加页面
     */
    public function add()
    {
        $this->addCate("pcategory-add");
    }

    /*
     * 显示编辑页面
     */
    public function update()
    {
        $this->updateCate("pcategory-update");
    }


}
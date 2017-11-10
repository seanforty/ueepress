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
use app\api\service\AdminCategoryMenu;
use app\api\service\CategoryDropdownList;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Category extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->model = new \app\api\model\Category();
        parent::__construct();
    }

    /*
     * 显示分类目录列表页
     * @param void
     * @return void
     */
    public function getList(string $template)
    {
        $menuStr = (new AdminCategoryMenu($this->data))->menuTree();
        $this->assign("menuStr",$menuStr);
        $this->display($template);
    }

    /*
     * 分类目录添加页
     * @param void
     * @return void
     */
    public function addCate(string $template)
    {
        $dropdownStr = $this->dropdownMenu();
        $this->assign("dropdownStr",$dropdownStr);
        $this->display($template);
    }

    /*
     * 分类目录更新页
     * @param void
     * @return void
     */
    public function updateCate(string $template)
    {
        (new MustBePostiveValidate())->goCheck();
        $cid = intval(Request::get("id"));
        $res = $this->model->getCateByID($cid);
        DBException($res,"该ID类目不存在");
        $dropdownStr = $this->dropdownMenu(0,$cid);
        $this->assign("dropdownStr",$dropdownStr);
        $this->assign("res",$res[0]);
        $this->display($template);
    }

    /*
     * 分类目录下拉菜单，格式如下
     * <option value="id">菜单一</option>
     * <option value="id">├菜单二</option>
     * @param id int 根目录分类id
     * @param cid int 当前选中的分类id
     * @return string
     */
    public function dropdownMenu(int $rooId=0,int $cid=0)
    {
        $menuStr = (new CategoryDropdownList($this->data))->menuTree($rooId,$cid);
        return $menuStr;
    }
}
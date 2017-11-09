<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/20
 * Time: 5:52
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\api\model\Admin as AdminModel;
use app\api\model\Role  as RoleModel;
use app\api\service\DropdownList;
use app\libs\validate\IDValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Admin extends BaseController
{
    /*
     * 构造函数类属性AdminModel实例
     * @param void
     * @return void
     */
    public function __construct()
    {
        $this->model = new AdminModel;
        parent::__construct();
    }

    /*
     * 管理员列表页面
     * @param void
     * @return void
     */
    public function getAll()
    {
        $res = $this->model->getAllWithRole();
        $this->assign("res",$res);
        $this->display("admin-list");
    }

    /*
     * 新增管理员页面
     * @param void
     * @return void
     */
    public function add()
    {
        $roleMenu = $this->getRoleList();
        $this->assign("rolemenu",$roleMenu);
        $this->display("admin-add");
    }

    /*
     * 修改管理员信息页面
     * @param void
     * @return void
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::get("id");
        $res = $this->model->getOneWithRole(intval($aid));
        $this->assign("data",$res);
        $rid = $res?$res["role"][0]["rid"]:0;
        $roleMenu = $this->getRoleList(intval($rid));
        $this->assign("rolemenu",$roleMenu);
        $this->display("admin-update");
    }

    /*
     * 获取角色列表
     * @param void
     * @return void
     */
    public function getRoleList(int $rid=0):string
    {
        $data = (new RoleModel())->find();
        return $this->dropdownList($data,$rid);
    }

    /*
     * 获取管理员/角色下拉菜单
     * @param arr array
     * @return string
     */
    protected function dropdownList(array $arr,int $rid):string
    {
        $listStr = "";
        $listStr .= '<option selected>请选择角色</option>';
        if(!$arr){
            $listStr .= '<option value="0">暂无数据</option>';
            return $listStr;
        }
        foreach($arr as $v)
        {
            if($rid == $v["id"])
                $selected = "selected";
            else
                $selected = "";
            $listStr .= sprintf('<option value="%s" %s>%s</option>', $v["id"], $selected, $v["title"]);
        }
        return $listStr;
    }

    public function test()
    {
        print_r($_SERVER);
    }
}
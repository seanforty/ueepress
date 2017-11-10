<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/20
 * Time: 5:52
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\api\Model\Role as RoleModel;
use app\api\Model\Admin as AdminModel;
use app\libs\validate\IDValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Role extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new RoleModel;
    }

    /*
     * 角色列表
     * @param void
     * @return void
     */
    public function getAll()
    {
        $res = $this->model->getAllWithAdmin();
        $this->assign("res",$res);
        return $this->display("admin-role");
    }

    /*
     * 管理员角色更新页面
     * @param void
     * @return void
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $rid = intval(Request::get("id"));
        $res = $this->model->get($rid);
        $this->assign("res",$res);
        $this->display("admin-role-update");
    }

    /*
     * 添加角色
     * @param void
     * @return void
     */
    public function add()
    {
        $this->display("admin-role-add");
    }

    /*
     * 获取管理员列表
     * @param void
     * @return string
     */
    public function getAdminList(int $rid=0):string
    {
        $data = (new AdminModel())->find();
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
        $listStr .= '<option selected>请选择管理员</option>';
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



}
<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:13
 */

namespace app\api\controller;

use app\libs\validate\MustBePostiveValidate;
use libs\Cookie;
use libs\mvc\Controller;
use libs\Request;
use libs\Session;

class BaseController extends Controller
{
    protected $model = null;

    /*
     * 登录检查
     * @param void
     * @return void
     */
    public function defaultLoginCheck()
    {
        $tokenCookie = Cookie::getCookie("admin_login_token");
        $username    = Cookie::getCookie("admin_login_user");
        $tokenSession= Session::getSession($username);
        if ( !$username || ($tokenCookie != $tokenSession) ){
            exit( status(false,"未授权") );
        }
    }

    /*
     * 删除产品
     * RequestMethod POST
     * @param id
     * @return void
     */
    public function delete()
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::post("id");
        $res = $this->model->deleteByID(intval($aid));
        DBException($res,"删除失败");
        return status(true,"删除成功");
    }

    /*
     * 批量产品
     * RequestMethod POST
     * @param string ids
     * @return void
     */
    public function deleteAll()
    {
        $ids = Request::post("ids");
        $res = $this->model->delete(["id","IN",$ids]);
        DBException($res,"批量删除失败");
        return status(true,"删除成功");
    }

    /*
     * 修改状态
     * RequestMethod POST
     * @param id, status
     * @return void
     */
    public function changeStatus()
    {
        (new StatusValidate())->goCheck();
        $statusId = Request::post("status");
        $id = Request::post("id");
        $res = $this->model->updateByID(intval($id),["status"=>$statusId]);
        DBException($res,"修改状态失败");
        return status(true,"状态成功");
    }

    /*
     * 修改排序
     * RequestMethod POST
     * @param int listorder
     * @return void
     */
    public function changeListOrder()
    {
        $id = Request::post("id");
        $listorder = Request::post("listorder");
        $res = $this->model->updateByID(intval($id),["listorder"=>$listorder]);
        DBException($res,"更新失败");
        return status(true,"更新成功");
    }

}
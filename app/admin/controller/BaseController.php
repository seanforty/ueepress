<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:04
 */

namespace app\admin\controller;

use app\api\service\CategoryDropdownList;
use libs\Cookie;
use libs\mvc\Controller;
use libs\Request;
use libs\Session;

class BaseController extends Controller
{
    protected $model = null;
    protected $username = "";

    public function __construct()
    {
        $this->defaultLoginCheck();
        $this->baseInfo();
    }

    /*
     * 登录检查
     * @param void
     * @return void
     */
    protected function defaultLoginCheck()
    {
        $tokenCookie = Cookie::getCookie("admin_login_token");
        $username    = Cookie::getCookie("admin_login_user");
        $this->username    = Cookie::getCookie("admin_show_user");
        $tokenSession= Session::getSession($username);
        if ( !$username || ($tokenCookie != $tokenSession) ){
            header("Location: ".url(["path"=>"admin/login/index"]));
        }
    }

    /*
     * 绑定系统基本信息
     * @param void
     * @return void
     */
    protected function baseInfo()
    {
        $this->assign("uee_version",UEE_VERSION);
        $this->assign("uee_name",UEE_NAME);
    }

    /*
     * 获取搜索查询条件， 用于产品/文章的搜索功能
     * @RequestMethod POST
     * @access protected
     * @param int ctype 产品记录类型
     * @param string keyword,categoryid,logmin,logmax 搜索关键词，分类ID，最小日期，最大日期
     * @return array
     */
    protected function getWhere(int $ctype=1):array
    {
        $where = [];

        //type决定文章或产品的类型
        $where[] = ["type","=",$ctype];

        $keyword = Request::get("keyword");
        //关键词与标题匹配
        if($keyword){
            $where[] = ["title","like","%".$keyword."%"];
        }
        //限定分类
        $categoryId = Request::get("categoryid");
        if($categoryId){
            $where[] = ["cate_id","=",$categoryId];
        }
        //最近日期
        $logMax = Request::get("logmax");
        if($logMax){
            $where[] = ["create_time","<",$logMax];
        }
        //最远日期
        $logMin = Request::get("logmin");
        if($logMin){
            $where[] = ["create_time",">",$logMin];
        }
        return $where;
    }

    /*
     * 获取分类目录下拉菜单代码
     * @access protected
     * @param int ctype 分类类型
     * @param int cid 选中分类
     * @return string
     */
    protected function getMenuStr(int $ctype=1,int $cid=0):string
    {
        $data = (new \app\api\model\Category())->find(["type","=",$ctype]);
        $menuStr = (new CategoryDropdownList($data))->menuTree(0,$cid,true);
        return $menuStr;
    }
}
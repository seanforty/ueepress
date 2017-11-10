<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/21
 * Time: 6:45
 */
declare(strict_types=1);
namespace app\api\controller;


use app\api\exception\ParameterException;
use app\api\service\AdminIndexMenu;
use app\api\service\CategoryDropdownList;
use app\api\service\DropdownList;
use app\api\service\Menu;
use app\libs\validate\ListOrderValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Menusite extends BaseController
{
    protected $beforeActionList = [
        "addCate"=>"defaultLoginCheck",
        "addPage"=>"defaultLoginCheck",
        "updateMenuContent"=>"defaultLoginCheck",
    ];

    public function __construct()
    {
        $this->model = new \app\api\model\Menusite();
        $this->model2= new \app\api\model\Menucontent();
    }

    /*
     * 将分类目录添加到指定菜单组
     * RequestMethod POST
     * @param int id 分类ID
     * @param int mid 菜单组ID
     * @return void
     */
    public function addCate()
    {
        (new MustBePostiveValidate())->goCheck();
        $cid = Request::post("id");
        $cateInfo = (new \app\api\model\Category())->get(intval($cid));
        $data = [];
        $data["mid"] = Request::post("mid");
        $data["title"] = $cateInfo["title"];
        $data["linkid"]    = $cateInfo["id"];
        $res = $this->model2->addAndReturnID($data);
        if(!$res){
            throw new ParameterException("添加分类到菜单组失败");
        }
        $data["id"] = $res;
        $data["linktype"] = "0";
        $data["target"] = 0;
        $data["img_id"] = 0;
        $data["listorder"] = 0;
        return json($data);
    }

    /*
     * 将页面添加到指定菜单组
     * RequestMethod POST
     * @param int id 页面ID
     * @param int mid 菜单组ID
     * @return void
     */
    public function addPage()
    {
        (new MustBePostiveValidate())->goCheck();
        $pid = Request::post("id");
        $pageInfo = (new \app\api\model\Page())->get(intval($pid));
        $data = [];
        $data["mid"] = Request::post("mid");
        $data["title"] = $pageInfo["title"];
        $data["linkid"] = $pageInfo["id"];
        $res = $this->model2->addAndReturnID($data);
        if(!$data){
            throw new ParameterException("添加页面到菜单组失败");
        }

        $data["id"] = $res;
        $data["linktype"] = "1";
        $data["target"] = 0;
        $data["img_id"] = 0;
        $data["listorder"] = 0;
        return json($data);
    }

    /*
     * 更新菜单项内容
     * RequestMethod POST
     * @param title,parent_id,linktype,linkid,target,img_id,listorder
     * @return json/string
     */
    public function updateMenuContent()
    {
        $data = [];
        $data["title"] = Request::post("title");
        $data["parent_id"] = Request::post("parent_id");
        $data["linktype"] = Request::post("linktype");
        $data["linkid"] = Request::post("linkid");
        $data["target"] = Request::post("target");
        $data["img_id"] = Request::post("img_id");
        $data["listorder"] = Request::post("listorder");
        $id   = Request::post("id");
        $res = $this->model2->updateByID(intval($id),$data);
        if(!$res){
            throw new ParameterException("更新菜单项内容失败");
        }
        return status(true,"更新菜单项内容成功");
    }

}
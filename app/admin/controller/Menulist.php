<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/21
 * Time: 6:44
 */
declare(strict_types=1);
namespace app\admin\controller;

use app\api\exception\ParameterException;
use app\api\model\Image as ImageModel;
use app\api\service\AdminIndexMenu;
use app\api\service\CategoryDropdownList;
use app\libs\validate\MustBePostiveNotRequiredValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Menulist extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Menulist();
        $this->model2= new \app\api\model\Menucontent();
    }

    /*
     * 显示菜单列表页
     * RequestMethod GET
     * @param int id 菜单组id
     * @
     */
    public function index()
    {
        (new MustBePostiveNotRequiredValidate())->goCheck();
        $menuId = Request::get("id");
        if(!$menuId){
            $firstRecord = $this->model->getOne();
            $menuId = $firstRecord?intval($firstRecord["id"]):0;
        }else{
            $menuId = intval($menuId);
        }
        $menuStr = $this->getMenuTableStr($menuId); //当前菜单组的菜单项列表
        $menuList = $this->getMenuList($menuId); //菜单组列表
        $cateList = $this->getCateList(); //分类列表
        $pageList = $this->getPageList(); //
        $this->assign("menulist",$menuList);
        $this->assign("catelist",$cateList);
        $this->assign("pagelist",$pageList);
        $this->assign("menustr",$menuStr);
        $this->display("menu-list");
    }

    /*
     * 获取菜单列表，返回<tr><td></td></tr>格式字符串，放在<tbody></tbody>之间
     * @param int mid 菜单组ID
     * @return string
     */
    public function getMenuTableStr(int $mid):string
    {
        $data = $this->model2->find(["mid","=",$mid],[["listorder","desc"],["id","desc"]]);
        $mestr = (new AdminIndexMenu($data))->menuTrees(0,$mid);
        return $mestr;
    }

    /*
     * 获取菜单组下拉列表，返回<option></option>格式字符串，放在<select></select>之间
     * @param int mid 菜单ID，返回选中
     * @return string
     */
    public function getMenuList(int $mid=0):string
    {
        $data = $this->model->find();
        $res = "";
        foreach($data as $v){
            if($mid == $v["id"]){
                $res .= sprintf('<option value="%s" selected>%s</option>',$v["id"],$v["title"]);
            }else{
                $res .= sprintf('<option value="%s">%s</option>',$v["id"],$v["title"]);
            }
        }
        return $res;
    }


    /*
     * 获取分类列表，返回<option></option>格式字符串，放在<select></select>之间
     * @param void
     * @return string
     */
    public function getCateList():string
    {
        $cateModel = new \app\api\model\Category();
        $artCate = $cateModel->find(["type","=","1"]);
        $proCate = $cateModel->find(["type","=","2"]);
        $resArt = (new CategoryDropdownList($artCate))->menuTree();
        $resPro = (new CategoryDropdownList($proCate))->menuTree();
        $res = "<option value='0'>---- 产品分类 ----</option>" . $resPro . "<option value='0'>---- 文章分类 ----</option>" . $resArt;
        return $res;
    }

    /*
     * 获取页面列表，返回<option></option>格式字符串，放在<select></select>之间
     * @param void
     * @return string
     */
    public function getPageList()
    {
        $data = (new \app\api\model\Article())->find(["type","=","2"]);
        $res = "";
        foreach($data as $v){
            $res .= sprintf('<option value="%s">%s</option>',$v["id"],$v["title"]);
        }
        return $res;
    }

    /*
     * 菜单更新页
     * RequestMethod GET
     * @param int id 菜单项ID
     * @param int mid 菜单组ID
     *
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $id = Request::get("id");
        $mid = Request::get("mid");
        $mestr = $this->getMenuDropdownStr(intval($mid),intval($id));
        $res = $this->model2->get(intval($id));
        if(!$res){
            throw new ParameterException("该菜单项不存在！");
        }
        $image = (new ImageModel)->getBy("id",$res["img_id"]);
        if($image){
            $res["image"] = $image[0];
        }

        $this->assign("menustr",$mestr);
        $this->assign("res",$res);
        $this->display("menu-update");
    }

    /*
     * 获取菜单下拉列表
     * @param int mid 菜单组id
     * @param int id  菜单项id
     * @return string
     */
    public function getMenuDropdownStr(int $mid,int $id):string
    {
        $data = $this->model2->find(["mid","=",$mid]);
        $mestr = (new CategoryDropdownList($data))->menuTree(0,$id);
        return $mestr;
    }



}
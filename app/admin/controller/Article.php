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
use app\api\model\Article as ArticleModel;
use app\api\service\CategoryDropdownList;
use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\AdminPaginationValidate;
use libs\Request;

class Article extends BaseController
{
    public function __construct()
    {
        $this->model = new ArticleModel();
        parent::__construct();
    }

    /*
     * 文章列表页面
     * RequestMethod POST
     * @param string template
     * @param int atype  1-文章 2-页面
     * @param int ctype 1-文章 2-产品
     * @param int page 页码，正整数
     * @return void
     */
    protected function getList(string $template,int $atype=1,int $ctype=1,bool $isCate=true)
    {
        (new AdminPaginationValidate())->goCheck();
        $pageNum = Request::get("page");
        if(!$pageNum){
            $pageNum = 1;
        }else{
            $pageNum = intval($pageNum);
        }

        $where = $this->getWhere($atype);
        $order = [["create_time","DESC"],["id","DESC"]];
        $res = $this->model->pagination($pageNum,$where,$order);
        $this->assign("res",$res);

        if($isCate){
            $menuStr = $this->getMenuStr($ctype);
            $this->assign("menustr",$menuStr);
        }

        $this->display($template);
    }

    /*
     * 文章添加页面
     * @param string template
     * @param int ctype 分类类型 1-文章 2-产品
     * @param bool isCate 是否分类
     * @return void
     */
    public function addArt(string $template,int $ctype=1,bool $isCate=true)
    {
        if($isCate){
            $menuStr = $this->getMenuStr();
            $this->assign("menustr",$menuStr);
        }
        $this->display($template);
    }

    /*
     * 文章编辑更新页面
     * @param string template
     * @param int ctype 分类类型 1-文章 2-产品
     * @param bool isCate 是否分类
     * @return void
     */
    public function updateArt(string $template,int $ctype=1,bool $isCate=true)
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::get("id");
        $res = $this->model->getWithImg(intval($aid));
        DBException($res,"该文章不存在");
        $this->assign("res",$res);

        if($isCate){
            $menuStr = $this->getMenuStr(1,intval($res["cate_id"]));
            $this->assign("menustr",$menuStr);
        }

        $this->display($template);
    }

}
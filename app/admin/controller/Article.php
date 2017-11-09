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
     * @param int page 页码，正整数
     * @return void
     */
    public function getList(){
        (new AdminPaginationValidate())->goCheck();
        $pageNum = Request::get("page");
        if(!$pageNum){
            $pageNum = 1;
        }else{
            $pageNum = intval($pageNum);
        }

        $where = $this->getWhere();
        $order = [["create_time","DESC"],["id","DESC"]];
        $res = $this->model->pagination($pageNum,$where,$order);
        $menuStr = $this->getMenuStr();
        $this->assign("res",$res);
        $this->assign("menustr",$menuStr);
        $this->display("article-list");
    }

    /*
     * 文章添加页面
     * @param void
     * @return void
     */
    public function add()
    {
        $menuStr = $this->getMenuStr();
        $this->assign("menustr",$menuStr);
        $this->display("article-add");
    }

    /*
     * 文章编辑更新页面
     * @param void
     * @return void
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::get("id");
        $res = $this->model->getArticles(["id","=",$aid]);
        if(!$res){
            throw new ParameterException("该文章不存在");
        }
        $menuStr = $this->getMenuStr(intval($res[0]["cate_id"]));
        $this->assign("menustr",$menuStr);
        $this->assign("res",$res[0]);
        $this->display("article-update");
    }

    /*
     * 获取分类目录下拉菜单代码
     * @param void
     * @return void
     */
    protected function getMenuStr(int $cid=0)
    {
        $data = (new \app\api\model\Category())->find();
        $menuStr = (new CategoryDropdownList($data))->menuTree(0,$cid,true);
        return $menuStr;
    }
}
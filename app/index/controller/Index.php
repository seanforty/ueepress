<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/3
 * Time: 10:28
 */
declare(strict_types=1);
namespace app\index\controller;

use app\api\model\Link;
use app\api\model\Product;

class Index extends BaseController
{
    public function __construct()
    {
        $this->model = new Product();
        parent::__construct();
    }

    /*
     * 显示首页
     * @param void
     * @return void
     */
    public function index()
    {
        $this->getCase();
        $this->link();
        $this->getService();
        $this->getArticleModule();
        $this->display("pc/index");
    }

    /*
     * 获取案例
     * @param void
     * @return void
     */
    protected function getCase()
    {
        $caselink = $this->siteInfo->getValueByKey("indexmodule4_link");
        $this->assign("caselink",$caselink);
        $res = $this->model->pagination(1, ["type", "=", "2"], ["id", "DESC"]);
        if (isset($res["data"])) {
            $this->assign("cases", $res["data"]);
        } else {
            $this->assign("cases", []);
        }
    }

    /*
     * 友情链接
     * @param void
     * @return void
     */
    protected function link()
    {
        $linkModel = new Link();
        $res = $linkModel->find(["status","=","1"]);
        $this->assign("link",$res);
    }

    /*
     * 首页服务内容
     * @param void
     * @return void
     */
    protected function getService()
    {
        $service = [];
        $service["indexmodule1_title"] = $this->siteInfo->getValueByKey("indexmodule1_title");
        $service["indexmodule1_subtitle"] = $this->siteInfo->getValueByKey("indexmodule1_subtitle");
        $service["indexmodule1_content"] = $this->siteInfo->getValueByKey("indexmodule1_content");
        $this->assign("indexmodule1",$service);
    }

    /*
     * 资讯模块
     */
    protected function getArticleModule()
    {
        $artcile = [];
        $artcile["indexmodule2_title"] = $this->siteInfo->getValueByKey("indexmodule2_title");
        $artcile["indexmodule2_subtitle"] = $this->siteInfo->getValueByKey("indexmodule2_subtitle");
        $artcile["indexmodule2_link"] = $this->siteInfo->getValueByKey("indexmodule2_link");
        $cateid1 = $this->siteInfo->getValueByKey("indexmodule2_cateid");
        $artcile["indexmodule2_list"] = $this->getArticles($cateid1);

        $artcile["indexmodule3_title"] = $this->siteInfo->getValueByKey("indexmodule3_title");
        $artcile["indexmodule3_subtitle"] = $this->siteInfo->getValueByKey("indexmodule3_subtitle");
        $artcile["indexmodule3_link"] = $this->siteInfo->getValueByKey("indexmodule3_link");
        $cateid2 = $this->siteInfo->getValueByKey("indexmodule3_cateid");
        $artcile["indexmodule3_list"] = $this->getArticles($cateid2);

        $this->assign("indexmodule2",$artcile);
    }

    protected function getArticles($cid)
    {
        $artcileModel = new \app\api\model\Article();
        $where = [ ["type","=","1"],["cate_id","=",$cid] ];
        $order = [ "id","DESC" ];
        $limit = [0,5];
        $res = $artcileModel->find($where,$order,$limit);
        return $res;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25
 * Time: 13:22
 */
declare(strict_types=1);
namespace app\admin\controller;


use app\api\exception\ParameterException;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Comment extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Comment();
    }

    /*
     * 文章评论
     * @param void
     * @return void
     */
    public function commentList()
    {
        $this->getList(0,"comment-list");
    }

    /*
     * 文章评论
     * @param void
     * @return void
     */
    public function messageList()
    {
      $this->getList(3,"message-list");
    }

    /*
     * 给定留言类型和模板，显示留言列表
     * RequestMethod GET
     * @param int page 通过get方式获取的页码
     * @param int type 留言类型
     * @param string template 模板
     * @return void
     */
    public function getList(int $type,string $template)
    {
        $page = Request::get("page");
        if(!$page){
            $page = 1;
        }else{
            $page = intval($page);
        }

        $where = [
            ["type","=",$type]
        ];
        $where = array_merge($where, $this->getWhere());
        $res = $this->model->pagination($page,$where);
        $this->assign("res",$res);
        $this->display($template);
    }

    /*
     * 阅读评论
     * RequestMethod GET
     * @param int id
     * @return void
     */
    public function readComment()
    {
        (new MustBePostiveValidate())->goCheck();
        $cid = Request::get("id");
        $res = $this->model->get(intval($cid));
        if(!$res){
            throw new ParameterException("评论不存在！");
        }
        $this->model->updateByID(intval($cid),["status"=>"1"]);
        $this->assign("res",$res);
        $this->display("comment-read");
    }
}
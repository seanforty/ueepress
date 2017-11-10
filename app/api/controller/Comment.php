<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25
 * Time: 13:22
 */
declare(strict_types=1);
namespace app\api\controller;


use app\api\exception\ParameterException;
use app\libs\validate\MessageAddValidate;
use app\libs\validate\MustBePostiveValidate;
use app\libs\validate\StatusValidate;
use libs\Request;

class Comment extends BaseController
{

    public function __construct()
    {
        $this->model = new \app\api\model\Comment();
    }

    /*
     * 保存留言
     * RequestMethod POST
     * @param name,mobile,email,title,content
     * @return void
     */
    public function saveMessage()
    {
        (new MessageAddValidate())->goCheck();
        $data = Request::postMany(["name","mobile","email","title","content"]);
        $data["type"] = 3;
        $res = $this->model->add($data);
        DBException($res,"保存留言失败！");
        return status(true,"留言已提交！");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 16:06
 */
declare(strict_types=1);
namespace app\admin\controller;


class Siteinfo extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Siteinfo();
    }

    public function index()
    {
        $data = $this->getInfo();
        $this->assign("data",$data);
        $this->display("system-base");
    }

    /*
     * 将查询到的网站基础设置修改为关联数组
     * @param void
     * @return array
     */
    protected function getInfo():array
    {
        $data = [];
        $res = $this->model->find();
        foreach($res as $v){
            $data[$v["key"]] = $v["value"];
        }
        return $data;
    }
}
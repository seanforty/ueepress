<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 17:13
 */

namespace app\admin\controller;


use app\api\exception\ParameterException;

class Sitetext extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Sitetext();
    }

    public function filterText()
    {
        $data = $this->model->find(["key","=","filterwords"]);
        if(!$data){
            throw new ParameterException("数据查询失败！");
        }
        $this->assign("data",$data[0]);
        $this->display("system-shielding");
    }
}
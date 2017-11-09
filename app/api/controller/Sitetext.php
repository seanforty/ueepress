<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 17:13
 */

namespace app\api\controller;


use app\api\exception\ParameterException;
use libs\Request;

class Sitetext extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Sitetext();
    }

    /*
     * 更新屏蔽关键词组
     */
    public function updateFilterText()
    {
        $filterText = Request::post("filtertext");
        $res = $this->model->update(["value"=>$filterText],["key","=","filterwords"]);
        if(!$res){
            throw new ParameterException("更新失败");
        }
        return status(true,"更新成功");
    }

    /*
     * 更新单条数据
     */
    protected function update()
    {

    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 16:06
 */
declare(strict_types=1);
namespace app\api\controller;


use app\api\exception\ParameterException;
use libs\Request;

class Siteinfo extends BaseController
{
    protected $beforeActionList = [
        "update"=>"defaultLoginCheck"
    ];

    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Siteinfo();
    }

    /*
     * 更新网址基础设置
     * RequestMethod POST
     * @param string
     * @return void
     */
    public function update()
    {
        $data = Request::post();
        $res = $this->model->batchUpdate($data);
        if(!$res){
            throw new ParameterException("数据更新失败");
        }
        return status(true,"success");
    }

}
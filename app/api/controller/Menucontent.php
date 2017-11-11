<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/11
 * Time: 10:10
 */

namespace app\api\controller;


class Menucontent extends BaseController
{
    public function __construct()
    {
        $this->model = new \app\api\model\Menucontent();
    }

}
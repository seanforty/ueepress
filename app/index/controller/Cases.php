<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 15:38
 */
declare(strict_types=1);
namespace app\index\controller;

class Cases extends Category
{
    public function __construct()
    {
        parent::__construct();
        $this->contentObj = new \app\api\model\Product();
    }

    public function index(int $page = 0, int $cid = 0)
    {
        $this->recommendPro();
        $this->indexBase("pc/case",$page,$cid,2,2);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/2
 * Time: 11:05
 */
declare(strict_types=1);
namespace app\index\controller;

use app\api\service\Breadcrumb;

class Acategory extends Category
{
    public function __construct()
    {
        parent::__construct();
        $this->contentObj = new \app\api\model\Article();
    }

    public function index(int $page = 0, int $cid = 0)
    {
        $this->recommendPro();
        $this->indexBase("pc/acategory",$page,$cid,1);
    }

}
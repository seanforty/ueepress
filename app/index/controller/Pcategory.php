<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/2
 * Time: 11:05
 */
declare(strict_types=1);
namespace app\index\controller;

use app\api\model\Product;

class Pcategory extends Category
{
    public function __construct()
    {
        parent::__construct();
        $this->contentObj = new Product();
    }

    public function index(int $page = 0, int $cid = 0,int $ctype=1)
    {
        $this->indexBase("pc/pcategory",$page,$cid,1);
    }

}
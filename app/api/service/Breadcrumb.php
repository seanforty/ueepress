<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3
 * Time: 9:32
 */
declare(strict_types=1);
namespace app\api\service;


use app\api\model\Category;
use app\api\model\Page;

class Breadcrumb
{
    public function render(string $controller,int $id):string
    {
        $str = '当前位置：<a href="index.php">首页</a> ';
        if("page"==$controller){
            $data = (new Page())->get($id);
            $str .= $data["title"];
        }elseif("category"==$controller || "article"==$controller){
            $category = new Category();
            $str .= $this->getCates(intval($id),$category,"","","");
        }
        return $str;
    }

    protected function getCates(int $id,Category $category,string $startStr,string $midStr,string $endStr,string &$crumb=""):string
    {
        $res = $category->get($id);
        $crumb = $startStr . " &gt; " .$res["title"] . $endStr . $crumb;
        if(0!=$res["parent_id"]){
            $this->getCates(intval($res["parent_id"]),$category,$startStr,$midStr,$endStr,$crumb);
        }
        return $crumb;
    }
}
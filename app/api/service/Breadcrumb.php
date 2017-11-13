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
    /*
     * 生成面包屑导航
     * @param string controller
     * @param int id
     * @param string title
     * @return string
     */
    public function render(string $controller,int $id,string $title=""):string
    {
        $str = '您现在所在位置：<a href="'.url(["path"=>"index"]).'">首页</a> ';
        $cateObj = new Category();

        switch($controller){
            case "index/page/index":
                $str .= ' > ' . $title;
                break;
            case "index/acategory/index":
                $str .= $this->getCates($id,$cateObj,"index/acategoray/index",' &gt; <a href="%s">%s</a>');
                break;
            case "index/pcategory/index":
                $str .= $this->getCates($id,$cateObj,"index/pcategoray/index",' &gt; <a href="%s">%s</a>');
                break;
            case "index/cases/index":
                $str .= ' > ' . $title;
                break;
            case "product":
                $str .= $this->getCates($id,$cateObj,"index/product/index",'<a href="%s">%s</a>');
                $str .= ' > ' . $title;
                break;
            case "article":
                $str .= $this->getCates($id,$cateObj,"index/article/index",'<a href="%s">%s</a>');
                $str .= ' > ' . $title;
                break;
            case "cases":
                $str .= $this->getCates($id,$cateObj,"index/cases/index",'<a href="%s">%s</a>');
                $str .= ' > ' . $title;
                break;
        }
        return $str;
    }

    /*
     * 根据分类ID获取分类层级
     * @param int id  分类ID
     * @param Category category对象
     * @param string startStr 字符串前缀
     * @param string midStr 字符串中间
     * @param string endStr 字符串后缀
     * @param string crumb 递归时传值使用
     */
    protected function getCates(int $id,Category $category,$path,string $part,string &$crumb=""):string
    {
        $res = $category->get($id);
        if(!$res) return "";
        $crumb = " > " . sprintf($part,url(["path"=>$path]),$res["title"]) . $crumb;
        if(0!=$res["parent_id"]){
            $this->getCates(intval($res["parent_id"]),$category,$part,$crumb);
        }
        return $crumb;
    }
}
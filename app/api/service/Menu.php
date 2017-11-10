<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/21
 * Time: 4:39
 */
declare (strict_types=1);
namespace app\api\service;

use app\api\exception\ParameterException;

class Menu
{
    /* 初始化时赋值,存入二维菜单数据
     * [
     *    ["id","title","parent_id","access_id","url"...]
     *    ["id","title","parent_id","access_id","url"...]
     * ]
     */
    protected $cateList = array();

    /*
     * 初始化对象并赋值属性 $cateList
     * @param void
     * @return void
     */
    public function __construct($arr=[])
    {
        if( !is_array($arr) ){
            throw new ParameterException("参数不是数组",701);
        }
        $this->AssociateArray($arr);
    }

    /*
     * 转换为关联数组
     * @param data array
     * @return void
     */
    protected function AssociateArray(array $data)
    {
        $ids = array_column($data,"id");
        $this->cateList = array_combine($ids,$data);
    }

    /*
     * 获取父级分类信息ID
     * @param cid int 当前分类ID
     * @return string
     */
    protected function getParentID(int $cid):string
    {
        //当前无分类，默认为0时
        if(0==$cid){
            return "0";
        }
        if( isset($this->cateList[$cid]["parent_id"]) ){
            $pid = $this->cateList[$cid]["parent_id"];
        }else{
            $pid = 0;
        }

        if($pid){
            return $this->cateList[$pid]["id"];
        }else{
            return "0";
        }
    }

    /*
     * 返回所有一级分类信息
     * @return array
     */
    protected function getAllTopCates():array
    {
        $arr = array();
        foreach($this->cateList as $v){
            if(0==$v["parent_id"]){
                array_push($arr,$v);
            }
        }
        return $arr;
    }

    /*
     * 返回$id所在一级分类信息(若$id为0则返回所有一级分类信息)
     * @param id int
     * @return array
     */
    protected function getTopCates(int $id):array
    {
        if(0==$id){
            return $this->getAllTopCates();
        }

        foreach($this->cateList as $v){
            if($v["id"] == $id){
                if(0 != $v["parent_id"]){
                    return $this->getTopCate($v["parent_id"]);
                }else{
                    return $v;
                }
            }
        }
    }

    /*
     * 返回$id下一级分类信息
     * @param id int
     * @return array
     */
    protected function getSubCates(int $id):array
    {
        $arr = [];
        foreach($this->cateList as $v)
        {
            if($v["parent_id"] == $id){
                array_push($arr, $v);
            }
        }
        return $arr;
    }

    /*
     * 需要在子类中重写
     * 返回指定id所在一级分类及其所有子信息所构成的菜单代码,若id为0则所有分类构成的菜单
     * @param id int
     * return string
     */
    public function menuTree(int $id=0):string{}
}
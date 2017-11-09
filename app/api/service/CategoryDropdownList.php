<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/20
 * Time: 20:41
 */
declare(strict_types=1);
namespace app\api\service;


class CategoryDropdownList extends Menu
{
    /*
     * $cuid 默认显示当前给定的父目录
     * 分类目录下拉菜单，格式如下
     * <option value="id">菜单一</option>
     * <option value="id">├菜单二</option>
     * @param id int 根目录分类id
     * @param curr bool  true 默认选中当前分类，false 默认选中父级分类
     * @return string
     */
    public function menuTree(int $id=0, int $cuid=0, bool $curr=false): string
    {
        if(0==count($this->cateList)){
            return '<option value="0">暂无数据</option>';
        }
        if(!$curr){
            $pid = $this->getParentID($cuid);
        }else{
            $pid = $cuid;
        }

        $menuStr = "";
        $firstArr = $this->getTopCates($id);
        foreach($firstArr as $v){ //一级菜单

            if($v["id"]==$pid){
                $menuStr.='<option value="'.$v["id"].'" selected>'.$v["title"]."</option>\n";
            }else{
                $menuStr.='<option value="'.$v["id"].'">'.$v["title"]."</option>\n";
            }
            $secondsArr = $this->getSubCates( intval($v["id"]) );
            if(!empty($secondsArr)){ //二级菜单
                foreach($secondsArr as $w){
                    if($w["id"]==$pid){
                        $menuStr.='<option value="'.$w["id"].'" selected>├'.$w["title"]."</option>\n";
                    }else{
                        $menuStr.='<option value="'.$w["id"].'">├'.$w["title"]."</option>\n";
                    }
                    $thirdsArr = $this->getSubCates( intval($w["id"]) );
                    if(!empty($thirdsArr)){
                        foreach ($thirdsArr as $u){
                            if($u["id"]==$pid){
                                $menuStr.='<option value="'.$u["id"].'" selected>&nbsp;&nbsp;&nbsp;&nbsp;├'.$u["title"]."</option>\n";
                            }else{
                                $menuStr.='<option value="'.$u["id"].'">&nbsp;&nbsp;&nbsp;&nbsp;├'.$u["title"]."</option>\n";
                            }
                        }
                    }
                }
            }
        }
        return $menuStr;
    }
}
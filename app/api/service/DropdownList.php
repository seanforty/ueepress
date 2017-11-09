<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/20
 * Time: 20:41
 */
declare(strict_types=1);
namespace app\api\service;


class DropdownList extends Menu
{
    /*
     * $cuid 默认显示当前给定的目录
     * 分类目录下拉菜单，格式如下
     * <option value="id">菜单一</option>
     * <option value="id">├菜单二</option>
     * @param id int 根目录分类id
     * @return string
     */
    public function menuTree(int $id=0, int $cuid=0): string
    {
        if(0==count($this->cateList)){
            return '<option value="0">暂无数据</option>';
        }

        $menuStr = "";
        $firstArr = $this->getTopCates($id);
        foreach($firstArr as $v){ //一级菜单
            if($v["id"]==$cuid){
                $menuStr.='<option value="'.$v["id"].'" selected>'.$v["title"]."</option>\n";
            }else{
                $menuStr.='<option value="'.$v["id"].'">'.$v["title"]."</option>\n";
            }
            $secondsArr = $this->getSubCates( intval($v["id"]) );
            if(!empty($secondsArr)){ //二级菜单
                foreach($secondsArr as $w){
                    if($w["id"]==$cuid){
                        $menuStr.='<option value="'.$w["id"].'" selected>├'.$w["title"]."</option>\n";
                    }else{
                        $menuStr.='<option value="'.$w["id"].'">├'.$w["title"]."</option>\n";
                    }
                    $thirdsArr = $this->getSubCates( intval($w["id"]) );
                    if(!empty($thirdsArr)){
                        foreach ($thirdsArr as $u){ //三级菜单
                            if($u["id"]==$cuid){
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
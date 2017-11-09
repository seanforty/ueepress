<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/20
 * Time: 20:41
 */
declare(strict_types=1);
namespace app\api\service;


class AdminCategoryMenu extends Menu
{
    /*
     * 分类目录下拉菜单，格式如下
     * <option value="id">菜单一</option>
     * <option value="id">├菜单二</option>
     * @param id int 根目录分类id
     * @return string
     */
    public function menuTree(int $id = 0): string
    {
        $menuStr = "";

        //数据数组为空，返回空字符串
        if(0==count($this->cateList)){
            return "<tr><td colspan='7'>暂无数据</td></tr>";
        }

        $deleteUrl = url(["path"=>"api/category/delete"]);

$modStr = <<<EOT
<tr class="text-c %s">
    <td><input type="checkbox" class="dataid" name="id" value="%s"></td>
    <td>%s</td>
    <td onClick="showsub(%s)" style="text-align: left;">%s</td>
    <td>%s</td>
    <td>%s</td>
    <td><input type="text" size="3" value="%s" data-attr="10" name="listorder" onchange="changeorder(this,%s)"></td>
    <td class="f-14">
        <a title="编辑" href="javascript:;" onclick="pop_layer('类目编辑','%s','800','550')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
        <a title="删除" href="javascript:;" onclick="del_data(this,'%s','$deleteUrl')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
    </td>
</tr>
EOT;

        $firstArr = $this->getTopCates($id);
        foreach($firstArr as $v){ //一级菜单
            $secondsArr = $this->getSubCates( intval($v["id"]) );
            if(!empty($secondsArr)){
                $tempTitle = "<b>" . $v['title'] . "</b>" . "<span style='color:darkblue;'>[点击]</span>";
            }else{
                $tempTitle = "<b>" . $v['title'] . "</b>";
            }
            $editLink = url([
                "path"=>"admin/category/update",
                "params"=>[
                    "id"=>$v["id"]
                ]
            ]);
            $menuStr .= sprintf($modStr,"",$v['id'],$v['id'],$v['id'],$tempTitle,$v['img_id'],$v['description'],$v['listorder'],$v["id"],$editLink,$v["id"]);

            if(!empty($secondsArr)){ //二级菜单
                foreach($secondsArr as $w){
                    $thirdsArr = $this->getSubCates( intval($w["id"]) );
                    if(!empty($thirdsArr)){
                        $tempTitle = "&nbsp;&nbsp;&nbsp;&nbsp;├".$w['title'] . "<span style='color:darkblue;'>[点击]</span>";
                    }else{
                        $tempTitle = "&nbsp;&nbsp;&nbsp;&nbsp;├".$w['title'];
                    }
                    $tempClass = "pid-".$v['id'];
                    $editLink = url([
                        "path"=>"admin/category/update",
                        "params"=>[
                            "id"=>$w["id"]
                        ]
                    ]);
                    $menuStr .= sprintf($modStr,$tempClass,$w['id'],$w['id'],$w['id'],$tempTitle,$w['img_id'],$w['description'],$w['listorder'],$w["id"],$editLink,$w["id"]);

                    if(!empty($thirdsArr)){  //三级菜单
                        foreach ($thirdsArr as $u){
                            $tempClass = "pid-".$v['id']." pid-".$w['id'];
                            $tempTitle = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├".$u['title'];
                            $editLink = url([
                                "path"=>"admin/category/update",
                                "params"=>[
                                    "id"=>$u["id"]
                                ]
                            ]);
                            $menuStr .= sprintf($modStr,$tempClass,$u['id'],$u['id'],$u['id'],$tempTitle,$u['img_id'],$u['description'],$u['listorder'],$u["id"],$editLink,$u["id"]);
                        }
                    }
                }
            }
        }
        return $menuStr."</tbody>";
    }
}
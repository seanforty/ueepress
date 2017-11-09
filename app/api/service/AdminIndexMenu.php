<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/20
 * Time: 20:41
 */
declare(strict_types=1);
namespace app\api\service;


class AdminIndexMenu extends Menu
{

    /*
     * 返回菜单项类型
     * @param int linktype
     * @return string
     */
    protected function getMenuType(int $linktype):string
    {
        switch ($linktype){
            case 0:
                return "分类";
            case 1:
                return "页面";
            case 2:
                return "超链接";
            default:
                return "未知";
        }
    }

    /*
     * 菜单目录下拉菜单，格式如下
     * <option value="id">菜单一</option>
     * <option value="id">├菜单二</option>
     * @param id int 当前链接id
     * @param mid 菜单id
     * @return string
     */
    public function menuTrees(int $id=0,int $mid): string
    {
        //数据数组为空，返回空字符串
        if(0==count($this->cateList)){
            return "<tr><td colspan='9'>暂无数据</td></tr>";
        }

        $menuStr = "";
        $deleteUrl = url(["path"=>"api/menusite/delete"]);

$modStr = <<<EOT
<tr class="text-c %s">
    <td><input type="checkbox" class="dataid" name="id" value="%s"></td>
    <td>%s</td>
    <td onClick="showsub('%s')" style="text-align: left;">%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td><input type="text" size="3" value="%s" name="listorder" onchange="changeorder(this,'%s')"></td>
    <td class="f-14">
        <a title="编辑" href="javascript:;" onclick="pop_layer('类目编辑','%s','800','550')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
        <a title="删除" href="javascript:;" onclick="del_data(this,'%s','%s')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
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
                "path"=>"admin/menusite/update",
                "params"=>[
                    "id"=>$v["id"],
                    "mid" => $mid
                ]
            ]);
            $linkType = $this->getMenuType(intval($v['linktype']));
            $target   = $v['target']?"新窗口打开":"本窗口打开";
            $menuStr .= sprintf($modStr,"",$v['id'],$v['id'],$v['id'],$tempTitle,$linkType,$v['linkid'],$target,$v['img_id'],$v['listorder'],$v['id'],$editLink,$v["id"],$deleteUrl);

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
                        "path"=>"admin/menusite/update",
                        "params"=>[
                            "id"=>$w["id"],
                            "mid" => $mid
                        ]
                    ]);
                    $linkType = $this->getMenuType(intval($w['linktype']));
                    $target   = $w['target']?"新窗口打开":"本窗口打开";
                    $menuStr .= sprintf($modStr,$tempClass,$w['id'],$w['id'],$w['id'],$tempTitle,$linkType,$w['linkid'],$target,$w['img_id'],$w['listorder'],$w['id'],$editLink,$w["id"],$deleteUrl);

                    if(!empty($thirdsArr)){  //三级菜单
                        foreach ($thirdsArr as $u){
                            $tempClass = "pid-".$v['id']." pid-".$w['id'];
                            $tempTitle = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├".$u['title'];
                            $editLink = url([
                                "path"=>"admin/menusite/update",
                                "params"=>[
                                    "id"=>$u["id"],
                                    "mid" => $mid
                                ]
                            ]);
                            $linkType = $this->getMenuType(intval($v['linktype']));
                            $target   = $u['target']?"新窗口打开":"本窗口打开";
                            $menuStr .= sprintf($modStr,$tempClass,$u['id'],$u['id'],$u['id'],$tempTitle,$linkType,$u['linkid'],$target,$u['img_id'],$u['listorder'],$u['id'],$editLink,$u["id"],$deleteUrl);
                        }
                    }
                }
            }
        }
        return $menuStr;
    }
}
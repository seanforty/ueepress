<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/21
 * Time: 6:45
 */
declare(strict_types=1);
namespace app\api\model;


class Menulist extends BaseModel
{
    /*
     * 获取菜单位及菜单项
     * @param int id
     * @return array
     */
    public function menuInfo(int $id):array
    {
        $data = $this->table()->get($id);
        if(!$data){
            return [];
        }else{
            $where = [
                ["mid","=",$data["id"]],
                ["parent_id","=","0"]
            ];
            $order = [
                ["listorder","DESC"],
                ["id","DESC"]
            ];
            $res = $this->table("menucontent")->where($where)->order($order)->find();
            $res = $this->hasOne($res,"image","img_id","id");
            return $res;
        }
    }

}
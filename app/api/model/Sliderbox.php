<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/24
 * Time: 6:54
 */
declare(strict_types=1);
namespace app\api\model;


class Sliderbox extends BaseModel
{
    /*
     * 获取广告位及图片
     * @param int id
     * @return array
     */
    public function sliderInfo(int $id):array
    {
        $single = $this->table()->get($id);
        if(!$single){
            return [];
        }else{
            $order = [["listorder","DESC"],["id","DESC"]];
            $res = $this->table("sliderimg")->where(["sid","=",$single["id"]])->order($order)->find();
            $res = $this->hasOne($res,"image","img_id","id");
            return $res;
        }
    }
}
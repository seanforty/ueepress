<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/24
 * Time: 6:55
 */
declare(strict_types=1);
namespace app\api\model;


class Sliderimg extends BaseModel
{

    /*
     * 关联查询返回广告图片列表
     */
    public function getImgs(array $where)
    {
        $order = [["listorder","desc"],["id","desc"]];
        if(!$where) {
            $data = $this->find([],$order);
        }else{
            $data = $this->find($where,$order);
        }

        $res = $this->hasOne($data,"Image","img_id","id");
        return $res;
    }

}
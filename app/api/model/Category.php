<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:17
 */
declare(strict_types=1);
namespace app\api\model;

use libs\mvc\Model;

class Category extends BaseModel
{

    /*
     * 获取指定ID的分类信息，包含缩略图信息
     * @param int cid 分类ID
     * @return void
     */
    public function getCateByID(int $cid):array
    {
        $data = $this->table()->where(["id","=",$cid])->find();
        $res = $this->hasOne($data,"Image","img_id","id");
        return $res;
    }



}
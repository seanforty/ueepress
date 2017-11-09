<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/21
 * Time: 5:00
 */
declare(strict_types=1);
namespace app\api\model;


use app\api\exception\ParameterException;

class Page extends BaseModel
{

    /*
     * 获取一个页面，关联查询image表
     * @param pid 页面ID
     * @return array
     */
    public function getOnePage(int $pid):array
    {
        $data = $this->table()->where(["id","=",$pid])->find();
        if(!$data){
            return [];
        }
        $res = $this->hasOne($data,"Image","img_id","id");
        return $res[0];
    }
}
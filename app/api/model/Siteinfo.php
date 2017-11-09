<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 16:07
 */
declare(strict_types=1);
namespace app\api\model;


class Siteinfo extends BaseModel
{
    /*
     * 批量更新数据
     * @param array data
     * @return bool;
     */
    public function batchUpdate(array $data):bool
    {
        foreach ($data as $k=>$v){
            $res = $this->update(["value"=>$v],["key","=",$k]);
        }
        return true;
    }

    /*
     * 依据key字段获取对应的value字段
     * @param string key
     * @return string
     */
    public function getValueByKey(string $key):string
    {
        $res = $this->getBy("key",$key);
        if($res){
            return $res[0]["value"];
        }else{
            return "";
        }
    }
}
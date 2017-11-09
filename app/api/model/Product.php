<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 10:30
 */
declare(strict_types=1);
namespace app\api\model;

class Product extends BaseModel
{
    /*
     * 获取分页数据
     * @param int page 当前页码
     * @param array where 查询条件
     * @param array order 排序条件
     * @param int pageSize 分页
     */
    public function pagination(int $page=1,array $where=[],array $order=[],int $pageSize=10)
    {
        $request = $this->table();
        if($where){
            $request->where($where);
        }
        if($order){
            $request->order($order);
        }
        $result = $request->pagination($page);
        $result["data"] = $this->hasOne($result["data"],"Image","img_id","id");
        return $result;
    }

    /*
     * 获取单条记录，带图片
     * @param int id
     * @return array
     */
    public function getOneRecord(int $id)
    {
        $res = $this->get($id);
        if( isset($res["img_id"]) ){
            $image = $this->table("image")->get(intval($res["img_id"]));
            if($image){
                $res["image"] = $image;
            }
        }
        return $res;
    }
}
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
     * 获取单个产品记录，带多张主图
     * @param int id
     * @return array
     */
    public function getWithMultiImg(int $id): array
    {
        $res = $this->table()->get($id);
        DBException($res,"产品不存在！");
        $ids = $res["imgs"];
        $images = (new Image())->find(["id","IN",$ids]);
        $res["images"] = $images;
        return $res;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/18
 * Time: 6:58
 */
declare(strict_types=1);
namespace app\api\model;

class Image extends BaseModel
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
        return $result;
    }
}
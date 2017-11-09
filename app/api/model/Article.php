<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:17
 */
declare(strict_types=1);
namespace app\api\model;

class Article extends BaseModel
{
    /*
     * 获取文章列表（包含缩略图和分类信息）
     * @param where array 查询条件
     * @param order array 排序方式
     * @return array
     */
    public function getArticles(array $where=[],array $order=[],array $limit=[]):array
    {
        $request = $this->table();
        if($where){
            $request->where($where);
        }
        if($order){
            $request->order($order);
        }
        if($limit){
            $request->limit($limit);
        }

        $data = $request->find();
        $data = $this->hasOne($data,"Image","img_id","id");
        $res  = $this->hasOne($data,"Category","cate_id","id");
        return $res;
    }

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
        $result["data"] = $this->hasOne($result["data"],"Category","cate_id","id");
        return $result;
    }
}
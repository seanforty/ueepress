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
     * 删除指定ID所在的记录
     * @param id int
     * @return int
     */
    public function deleteImgByID(int $id):bool
    {
        $res = $this->table()->get($id);
        DBException($res,"图片不存在！");
        $this->deleteImage($res);
        return true;
    }

    public function deleteImgByIDs(array $where):bool
    {
        $res = $this->table()->where($where)->find();
        DBException($res,"图片不存在！");
        foreach($res as $v){
            $this->deleteImage($v);
        }
        return true;
    }

    /*
     * 删除存储空间中的图片
     * @param array res 一条图片记录数组
     */
    protected function deleteImage(array $res)
    {
        $path1 =  ROOT_PATH . "public" . $res["img_url"];
        $path2 =  ROOT_PATH . "public" . $res["thumbnail"];

        if(file_exists($path1))
            @unlink( $path1 );
        if(file_exists($path2))
            @unlink( $path2 );

        $this->deleteByID(intval($res["id"]));
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
        return $result;
    }
}
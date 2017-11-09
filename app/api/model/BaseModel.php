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

class BaseModel extends Model
{
    /*
     * 获取给定条件下所有记录
     * 通过链式函数具体操作
     * @param void
     * @return array
     */
    public function find(array $where=[],array $orderby=[],array $limit=[]):array
    {
        $req = $this->table();
        if($where)
            $req = $this->table()->where($where);

        if($orderby)
            $req = $req->order($orderby);

        if($limit)
            $req = $req->limit($limit);

        return $req->find();
    }

    /*
     * 获取指定id的一条记录
     * @param id int
     * @param array
     */
    public function get(int $id):array
    {
        $res =  $this->table()->get($id);
        if($res){
            return $res;
        }else{
            return [];
        }
    }

    /*
     * 获取指定id的一条记录，附带图片信息
     * @param id int
     * @param array
     */
    public function getWithImg(int $id):array
    {
        $res = $this->get($id);
        if( isset($res["img_id"]) && (0!=$res["img_id"]) ){
            $image = (new Image())->get(intval($res["img_id"]));
            $res["image"] = $image;
        }
        return $res;
    }

    /*
     * 获取指定字段的值
     * @param field string
     * @param value string
     * @return array 结果为空则返回空数组
     */
    public function getBy(string $field, string $value):array
    {
        $res = $this->table()->where([$field,"=",$value])->find();
        return $res;
    }

    /*
     * 保存数据，返回执行结果
     * @param data array
     * @return int
     */
    public function add(array $data):int
    {
        return $this->table()->add($data);
    }

    /*
     * 保存数据，并返回记录的ID
     * @param data array
     * @return string
     */
    public function addAndReturnID(array $data):string
    {
        return $this->table()->addReturnId($data);
    }

    /*
     * 更新指定ID所在的记录
     * @param id int
     * @return int
     */
    public function updateByID(int $id,array $data):int
    {
        return $this->table()->where(["id","=",$id])->update($data);
    }

    /*
     * 由给定的条件更新符合条件的数据
     * @param data array
     * @param where array
     * @return
     */
    public function update(array $data, array $where):int
    {
        return $this->table()->where($where)->update($data);
    }

    /*
     * 删除指定ID所在的记录
     * @param id int
     * @return int
     */
    public function deleteByID(int $id):int
    {
        return $this->table()->where(["id","=",$id])->delete();
    }

    /*
     * 由给定条件删除符合条件的数据
     * @param where array
     * @return int
     */
    public function delete(array $where):int
    {
        return $this->table()->where($where)->delete();
    }


    /*
     * 专用于菜单和分类 必须存在字段parent_id
     * 删除菜单和分类时，如果被删除的记录存在子类目时，需要将子类目提升一级，直到其父类存在为止
     *
     */
    public function checkAndUpdateParentId()
    {
        $data = $this->table()->find();
        foreach ($data as $v) {
            if(0!=$v["parent_id"]){
                $res = $this->getTheRecord($data,intval($v["parent_id"]));
                if(!$res){
                    $this->updateByID(intval($v["id"]),["parent_id"=>0]);
                }
            }
        }
    }

    /*
     * 在数据集中找出父ID所在记录并返回，不存在则返回空数组
     * @param array data 数据集
     * @param int parentId 指定记录的父ID
     * @return array
     */
    protected function getTheRecord(array $data, int $parentId):array
    {
        foreach ($data as $v){
            if($v["id"] == $parentId){
                return $v;
            }
        }
        return [];
    }

    /*
     * 返回符合条件的第一条记录
     * @param array where
     * @param array order
     * @return array
     */
    public function getOne(array $where=[], array $order=[]):array
    {
        $query = $this->table();
        if($where){
            $query->where($where);
        }
        if($order){
            $query->order($order);
        }
        $res = $query->getOne();
        return $res;
    }

    /*
     * 获取数量
     * @param array where
     * @return int
     */
    public function getCount(array $where=[]):int
    {
        if($where){
            $res = $this->table()->where($where)->find();
        }else{
            $res = $this->table()->find();
        }
        return count($res);
    }

    /*
     * 字段值递增1
     * @param string column 要递增的字段值
     * @param int id 记录ID
     *
     */
    public function addByOne(string $column,int $id)
    {
        $this->table()->where(["id","=",$id])->addByOne($column);
    }

}
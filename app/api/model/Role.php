<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:17
 */
declare(strict_types=1);
namespace app\api\model;


use app\api\exception\RoleAddException;

class Role extends BaseModel
{
    /*
     * 获取包括管理员信息在内的角色列表
     * @param void
     * @return array
     */
    public function getAllWithAdmin()
    {
        $data = $this->table()->find();
        //如果数据为空，返回空数组
        if(!$data){
            return [];
        }
        $res = $this->toMany($data,"admin","role_admin","rid","aid");
        return $res;
    }

    /*
     * 删除指定ID的角色记录，同时删除role_admin表中相关记录
     * @param rid 角色ID
     * @return int
     */
    public function deleteRole(int $rid):int
    {
        $res = $this->deleteByID($rid);
        $this->table("role_admin")->where(["rid","=",$rid])->delete();
        return $res;
    }


}
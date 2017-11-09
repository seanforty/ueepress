<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 5:17
 */
declare(strict_types=1);
namespace app\api\model;


use app\api\exception\AdminAddException;
use app\api\exception\AdminRoleException;

class Admin extends BaseModel
{
    /*
     * 获取包括角色信息在内的管理员列表
     * @param void
     * @return array
     */
    public function getAllWithRole():array
    {
        $data = $this->table()->find();
        //如果数据为空，返回空数组
        if(!$data){
            return [];
        }
        $res = $this->toMany($data,"role","role_admin","aid","rid");
        return $res;
    }

    /*
     * 获取一条管理员数据
     * @param aid int 管理员id
     * @return array
     */
    public function getOneWithRole(int $aid):array
    {
        $data = $this->table()->get($aid);
        //如果数据为空，返回空数组
        if(!$data) {
            return [];
        }
        $role = $this->table("role_admin")->where(["aid","=",$aid])->find();
        $data[0]["role"] = $role;
        return $data[0];
    }

    /*
     * 将新注册的管理员信息存入数据库
     * @param data array
     * @return int
     */
    public function addNew(array $data,string $roleId):int
    {
        $aid = $this->table()->addReturnId($data);
        if(!$aid){
            throw new AdminRoleException("管理员账号添加失败，未获取到ID");
        }
        $roleData = [
            "aid" => $aid,
            "rid" => $roleId
        ];
        $res = $this->table("role_admin")->add($roleData);
        return $res;
    }

    /*
     * 更新管理员信息( 同时更新admin表和role_admin表 )
     * @param aid int 管理员ID
     * @param data array 需要更新的数据
     * @param rid int 角色ID
     * @return int
     */
    public function updateInfo(int $aid, array $data,int $rid):int
    {
        $res1 = $this->table()->where(["id","=",$aid])->update($data);
        $roleData = [ "rid" => $rid ];
        $res2 = $this->table("role_admin")->where(["aid","=",$aid])->update($roleData);
        return $res1;
    }

    /*
     * 通过ID更新数据，只更新admin表
     * @param aid int
     * @param data array
     */
    public function updateByID(int $aid,array $data):int
    {
        $res = $this->table()->where(["id","=",$aid])->update($data);
        return $res;
    }

    /*
     * 删除管理员账号
     * 同时删除admin表和role_admin表中相关数据
     * @param aid int
     * @return int
     */
    public function delByID(int $aid):int
    {
        $res1 = $this->table()->where(["id","=",$aid])->delete();
        $res2 = $this->table("role_admin")->where(["aid","=",$aid])->delete();
        return $res2;
    }

}
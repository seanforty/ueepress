<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/25
 * Time: 7:13
 */
declare(strict_types=1);
namespace app\api\controller;

use app\api\exception\AdminAddException;
use app\api\exception\AdminRoleException;
use app\api\model\Admin as AdminModel;
use app\libs\validate\AdminAddValidate;
use app\libs\validate\IDValidate;
use libs\Request;

class Admin extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck",
        "loginRecord"=>"defaultLoginCheck"
    ];

    /*
     * 构造函数，实例化AdminModel类
     */
    public function __construct()
    {
        $this->model = new AdminModel();
    }

    /*
     * 获取添加管理员信息处理后存入数据库
     * RequestMethod POST
     * @param title,password,password1,email,mobile,description
     * @return string/json
     */
    public function add()
    {
        (new AdminAddValidate())->goCheck();
        $data = Request::post();
        //验证用户名/邮箱和手机是否已存在
        $this->existUser($data["title"]);
        $this->existEmail($data["email"]);
        $this->existMobile($data["mobile"]);

        //删除data数组中不必要的元素
        $roleId = $this->beforeAdd($data);
        //data中添加盐和md5密码
        $data["salt"] = $this->getPassword($data["password"]);
        $res = $this->model->addNew($data,$roleId);
        if(!$res) {
            throw new AdminRoleException("管理员添加失败");
        }
        return status(true,"管理员账号添加成功");
    }

    /*
     * 更新给定ID管理员信息
     * RequestMethod POST
     * @param id,title,[password,password2],email,mobile,description
     * @return string/json
     */
    public function update()
    {
        (new AdminAddValidate())->goCheck();
        $data = Request::post();
        $aid = intval($data["id"]);
        //如果password不为空，则修改密码
        if(isset($data["password"])) {
            $roleId = $this->beforeAdd($data,true);
            $data["salt"] = $this->getPassword($data["password"]);
        }else{
            $roleId = $this->beforeAdd($data,false);
        }
        $roleId = intval($roleId);

        //检查字段是否已存在
        $this->existUser($data["title"],false, $aid);
        $this->existEmail($data["email"],false, $aid);
        $this->existMobile($data["mobile"],false, $aid);
        $res = $this->model->updateInfo($aid,$data,$roleId);
        if($res){
            return status(true,"更新成功");
        }else{
            return status(false,"未更新");
        }
    }

    /*
     * 在提交修改之前处理data数据
     * @param data array
     * @param changePWD bool
     * @return int
     */
    protected function beforeAdd(array &$data, bool $changePWD=true)
    {
        if($changePWD)
        {
            //验证两次输入的密码是否一致
            if($data["password"]!=$data["password2"])
            {
                throw new AdminRoleException("再次输出的密码不一致");
            }
        }
        //取出roleId,并删除data中无用数据
        $roleId = $data["role"];
        unset($data["id"]);
        unset($data["password2"]);
        unset($data["role"]);
        return $roleId;
    }

    /*
     * 验证用户名是否已存在
     * @param username string 待验证用户名
     * @param new bool 是否新增数据
     * @param aid int 管理员ID
     * @return void
     */
    protected function existUser(string $username, bool $new=true,int $aid=0)
    {
        $this->checkExist("title",$username,$new,$aid,"用户名已存在！");
    }

    /*
     * 验证邮箱是否已存在
     * @param email string
     * @param new bool是否新增数据
     * @param aid int 管理员ID
     * @return void
     */
    protected function existEmail(string $email, bool $new=true,int $aid=0)
    {
        $this->checkExist("email",$email,$new,$aid,"电子邮箱已存在！");
    }

    /*
     * 验证手机号码是否存在
     * @param string mobile
     * @param new bool是否新增数据
     * @param aid int 管理员ID
     * @return void
     */
    protected function existMobile(string $mobile, bool $new=true,int $aid=0)
    {
        $this->checkExist("mobile",$mobile,$new,$aid,"手机号码已存在！");
    }

    /*
     * 检查字段是否存在于数据库中，存在报出异常
     * @param field string 需验证字段
     * @param value string 需验证值
     * @param new bool是否新增数据
     * @param aid int 管理员ID
     * @param message string 错误提示语
     * @return void
     */
    protected function checkExist(string $field, string $value,bool $new=true,int $aid=0,string $message)
    {
        $res = $this->model->getBy($field,$value);
        //新增数据
        if($new && $res){
            throw new AdminRoleException($message);
        }
        //更新数据
        if(!$new){
            if( (1==count($res) && $aid!=$res[0]["id"]) || count($res)>1 ){
                throw new AdminRoleException($message);
            }
        }
    }

    /*
     * 获取盐和密码， 密码以引用方式传入，在函数中变更为md5加密形式
     * @param $pwd string 明文密码
     * @return string 盐
     */
    protected function getPassword(string &$pwd):string
    {
        $salt = getSalt();
        $pwd = getPassword($pwd, $salt);
        return $salt;
    }

    /*
     * 登录检查
     * @param string username 用户名
     * @param string password 密码
     * @return string/json
     */
    public function loginCheck(string $username,string $password):array
    {
        $res = $this->model->getBy("title",$username);
        if(!$res){
            return ["status"=>false,"msg"=>"用户名错误",];
        }
        $pwd = getPassword($password,$res[0]["salt"]);
        if($pwd == $res[0]["password"]){
            return ["status"=>true, "msg"=>"登录成功",];
        }else{
            return ["status"=>false,"msg"=>"密码错误",];
        }
    }

    /*
     * 更新登录记录
     * @param int id
     */
    public function loginRecord(string $username)
    {
        $this->model->addByOne("logintimes",1);
        $ip = $_SERVER["REMOTE_ADDR"];
        $time = time();
        $this->model->update(["lastloginip"=>$ip,"lastlogintime"=>$time], ["title","=",$username]);
    }
}
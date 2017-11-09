<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/3
 * Time: 21:35
 */
declare (strict_types=1);
namespace libs\db;

use libs\BaseException;
use libs\Config;
eval("use libs\\db\\".Config::getConfig("database.engine").";");
class DB
{
    protected static $_instance = null;
    protected $sql = [
        "data"  =>"",
        "table" =>"",
        "where" =>"",
        "order" =>"",
        "limit" =>"",
        "id"=>"",
        "update"=>"",
    ];

    /*
     * 单例模式,获取实例
     * @param void
     * @return void
     */
    public static function getInstance()
    {
        if(null == self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /*
     * 初始化时调用本方法连接数据库
     * @param void
     * @return void
     */
    public static function connect()
    {
        mysql::connect();
    }

    /*
     * @param data array 一维数组,要查询的字段,如["id","username","pwd", ...]
     * @return object
     */
    public function data(array $data):DB
    {
        if( $this->isLinearArray($data) ){
            $this->sql["data"] = implode(",",$data);
        }
        return $this;
    }

    /*
     * @param data string 要查询的表,如 "table1", "table1,table2"
     * @return object
     */
    public function table(string $table):DB
    {
        if( $prefix=Config::getConfig("database.prefix") ){
            $this->sql["table"] = $prefix;
        }

        if( is_string($table) ){
            $this->sql["table"] .= $table;
        }
        return $this;
    }

    /*
     * @param data array 一维或二维数组,要查询的条件
     * 如:[["id",">","10"],["create_time","<","2017"]] -> "id>10,create_time<2017"
     * @return object
     */
    public function where(array $where):DB
    {
        if( $this->isLinearArray($where) ){
            if("IN"==$where[1]){
                $this->sql["where"] = '`'.$where[0].'` '.$where[1].' (' . $where[2] . ")";
            }else{
                $this->sql["where"] = '`'.$where[0].'`'.$where[1].'"'.$where[2].'"';
            }
        }else{
            $this->sql["where"] = $this->arrayToString($where, " AND "," ","");
        }
        return $this;
    }

    /*
    * @param data array 一维或二维数组,要查询排序
     * 如[ ["id","desc"],["update_time","asc"] ]
    * @return object
    */
    public function order(array $order):DB
    {
        if( $this->isLinearArray($order) ){
            $this->sql["order"] = implode(" ",$order);
        }else{
            $this->sql["order"] = $this->arrayToString($order, ", "," ","orderby");
        }
        return $this;
    }

    /*
     * @param data array ,一维数组,如[0,10]
     * @return object
     */
    public function limit(array $limit):DB
    {
        if( $this->isLinearArray($limit) ){
            $this->sql["limit"] = implode(",", $limit);
        }
        return $this;
    }

    /*
     * 获取指定页记录
     * @param int page     当前页码
     * @param int pageSize 每页记录数
     * @return object 当前对象
     */
    public function pagination(int $page=1,int $pageSize=10):array
    {
        $pageSize = $pageSize ?: Config::getConfig("reading.pagesize");
        $sql = $this->querySQL(true,true);
        $res = mysql::querySQL($sql);
        $totalCount = isset($res[0][0])?$res[0][0]:0;

        $totalPage  = ceil($totalCount / $pageSize);
        $start = ($page - 1) * $pageSize;
        $data = $this->limit([$start, $pageSize])->find();
        $pagination = [
            "totalcount"=>$totalCount,
            "totalpage"=>$totalPage,
            "currentpage"=>$page,
            "pagesize"=>$pageSize
        ];

        //$this->switchTimestamp($data);

        $res = [
            "data"=>$data,
            "pagination"=>$pagination
        ];
        return $res;
    }

    /*
     * 返回所有数据
     * 组合链式查询 data,table,where,order,limit
     * @param void
     * @return array 失败则返回空数组
     */
    public function find():array
    {
        $sql = $this->querySQL();
        $this->reset();
        $data =  mysql::querySQL($sql);
        $this->switchTimestamp($data);
        return $data;
    }

    /*
     * 返回一条数据,需要参数id, 且表中有对应的id字段
     * 组合链式查询 data, table
     * @param id int
     * @reteurn array 失败则返回空数组
     */
    public function get(int $id=0):array
    {
        $this->sql["id"] = $id;
        $sql = $this->querySQL(false);
        $this->reset();
        $res = mysql::querySQL($sql);
        if($res){
            $this->switchTimestamp($res);
            return $res[0];
        }else{
            return array();
        }
    }


    /*
     * 返回符合条件的第一条记录，没有则返回空数组
     * @param void
     * @return array
     */
    public function getOne()
    {
        $this->sql["limit"] = "0,1";
        $sql = $this->querySQL();
        $this->reset();
        $res = mysql::querySQL($sql);
        if($res){
            $this->switchTimestamp($res);
            return $res[0];
        }else{
            return array();
        }
    }

    /*
     * 字段值增加1
     * @param string column 要递增的字段
     * @return true
     */
    public function addByOne(string $column,int $step=1)
    {
        $time = time(); //更新时间戳
        $this->sql["update"] = "`$column`=`$column`+$step,`update_time`=$time";
        $sql = $this->updateSQL([],true);
        $this->reset();
        return mysql::execSQL($sql);
    }

    /*
     * 更新数据,成功返回该操作影响的数据条数,否则返回0
     * 关联数组["id"=>1,"page"=>2] 转化为字符串 "id=1,page=2"
     * 组合链式查询 table where
     * @param arr array
     * @return int
     */
    public function update(array $arr):int
    {
        $arr["update_time"] = time();//添加时间戮
        $sql = $this->updateSQL($arr);
        $this->reset();
        return mysql::execSQL($sql);
    }

    /*
     * 增加数据 成功返回该操作影响的数据条数,否则返回0
     * 注： 此函数可批量保存数据
     * 参数格式 ["id"=>10,"title"=>"ex","price"=>29]
     * 组合链式查询 table
     * @param arr array
     * @return int
     */
    public function add(array $arr):int
    {
        $arr["create_time"] = time(); //添加时间戮
        $arr["update_time"] = time(); //添加时间戮
        $sql = "INSERT INTO " . $this->sql["table"];
        $sql .= $this->addArrToString($arr);
        $this->reset();
        return mysql::execSQL($sql);
    }

    /*
     * 重置查询
     * @param void
     * @return void
     */
    public function reset()
    {
        $this->sql = [
            "data"  =>"",
            "table" =>"",
            "where" =>"",
            "order" =>"",
            "limit" =>"",
            "id"=>"",
            "update"=>"",
        ];
    }

    /*
     * 增加数据 成功返回插入记录的id，否则返回空字符串
     * 组合链式查询 table
     * @param arr array
     * @return string
     */
    public function addReturnId(array $arr):string
    {
        $arr["create_time"] = time();
        $arr["update_time"] = time(); //添加时间戮
        $res = $this->add($arr);
        if($res) {
            return mysql::lastInsertId();
        }else
            return "";
    }

    /*
     * 删除数据, 成功返回该操作影响的数据条数,否则返回0
     * @param void
     * @return int
     */
    public function delete():int
    {
        $sql = "DELETE FROM " . $this->sql["table"];
        $sql .= " WHERE " . $this->sql["where"];
        $this->reset();
        return mysql::execSQL($sql);
    }

    /*
     * 将数组转为字符串
     * ["id"=>10,"title"=>"ex","price"=>29] 转为 "(id,title,price) VALUES (10,"ex",29)"
     * @param arr array
     * @return string
     */
    protected function addArrToString(array $arr):string
    {
        if($this->isLinearArray($arr)){
            $fields = "`".implode('`, `',array_keys($arr))."`";
            $data   = "'".implode("', '",$arr)."'";
            return sprintf("(%s) VALUES (%s)",$fields,$data);
        }else{
            throw new BaseException("DB:addArrToString参数错误: 必须为一维关联数组");
        }
    }

    /*
     * 组装查询类sql语句
     * @param bool type     true: findAll查询, false: get查询
     * @param bool isCount  true: 返回记录数量
     * @return string
     */
    protected function querySQL(bool $type=true,bool $isCount=false):string
    {
        if($isCount){
            $sql = "SELECT count(`id`)";
        }else{
            $sql = "SELECT " . ($this->sql["data"]?$this->sql["data"]:"*");
        }

        $sql .= " FROM " .$this->sql["table"];
        if($type){
            $sql .= $this->sql["where"]?" WHERE ".$this->sql["where"]:"";
            $sql .= $this->sql["order"]?" ORDER BY ".$this->sql["order"]:"";
            $sql .= $this->sql["limit"]?" LIMIT ".$this->sql["limit"]:"";
        }else{
            $sql .= $this->sql["id"]?" WHERE id=".$this->sql["id"]:"";
        }
        $sql .= ";";
        return $sql;
    }

    /*
     * 组装更新类sql语句
     * @param array arr 关联数组["id"=>1,"page"=>2] 转化为字符串 "id=1,page=2"
     * @param bool original false:传入数组， true:传入sql字符串(若为false请设置$this->sql['update'])
     * @return string
     */
    protected function updateSQL(array $arr, bool $original=false):string
    {
        if(!$original){
            array_walk($arr,function(&$v,$k){
                $v = "`" . $k . "`" . "=" . '"' . $v . '"';
            });
            $this->sql["update"] = implode(",",$arr);
        }

        $sql = "UPDATE " . $this->sql["table"];
        $sql.= " SET " . $this->sql["update"];
        $sql.= $this->sql["where"]?" WHERE " . $this->sql["where"]:"";
        return $sql;
    }

    /*
     * 二维数组转化为字符串,如:["id",">","10"],["create_time","<","2017"] -> "id>10,create_time<2017"
     * @param arr array 二维数组
     * @param first string  第一维数组元素连接符
     * @param second string 第二维数组元素连接符
     * @return string
     */
    protected function arrayToString(array $arr, string $first=", ", string $second=" ",$type=""):string
    {
        if(!$type){
            array_walk($arr,function(&$v,$k,$second){
                if("IN" == $v[1]){
                    $v =  '`' . $v[0] . '`' . $second . $v[1] .$second . '(' . $v[2] . ')';
                }else{
                    $v =  '`' . $v[0] . '`' . $second . $v[1] .$second . '"' . $v[2] . '"';
                }
            },$second);
        }elseif("orderby"==$type){
            array_walk($arr,function(&$v,$k,$second){
                $v =  '`' . $v[0] . '`' . $second . $v[1];
            },$second);
        }
        return implode($first, $arr);
    }

    /*
     * 一维数组返回true, 否则为多维数组返回false
     * @param arr array
     * @return bool
     */
    protected function isLinearArray(array $arr):bool
    {
        if( count($arr) == count($arr,1) ){
            return true;
        }else{
            return false;
        }
    }

    protected function switchTimestamp(array &$arr)
    {
        if(!($timeFormat = Config::getConfig("other.timeformat"))){
            $timeFormat = "Y-m-d H:i:s";
        }

        if(!$this->isLinearArray($arr)){
            foreach ($arr as &$v){
                if( isset($v["create_time"]) )
                {
                    $v["create_time"] = date($timeFormat,intval($v["create_time"]));
                }
                if( isset($v["update_time"]) )
                {
                    $v["update_time"] = date($timeFormat,intval($v["update_time"]));
                }
            }
        }else{
            if( isset($arr["create_time"]) )
            {
                $arr["create_time"] = date($timeFormat,intval($arr["create_time"]));
            }
            if( isset($arr["update_time"]) )
            {
                $arr["update_time"] = date($timeFormat,intval($arr["update_time"]));
            }
        }
    }

    /*
     * 禁止外部调用下列方法
     */
    protected function __construct(){}
    protected function __clone(){}

}
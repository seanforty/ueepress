<?php
declare (strict_types=1);
namespace libs\mvc;

use libs\db\DB;

class Model{
    protected static $db = null;

    /*
     * 构造函数,获取数据库实例
     * @param void
     * @return void
     */
    public function __construct(){
        if( null === self::$db ){
            self::$db = DB::getInstance();
        }
    }

    /*
     * 设置当前模型为数据库表,返回DB类对象
     * @param void
     * @return object
     */
    protected function table(string $table="")
    {
        if(!$table){
            return self::$db->table( $this->getDBName() );
        }else{
            return self::$db->table( $table );
        }
    }

    /*
     * 获取当前类名用作数据库表名
     * @param path string
     * @return string
     */
    protected function getDBName(string $path=""):string
    {
        $namespace = $path?$path:get_class($this);
        $nameArr = explode("\\",$namespace);
        $className = end($nameArr);
        return strtolower($className);
    }

    /*
     * 一对一关系
     * 同hasMany
     */
    public function hasOne($data,$model,$localKey,$ModelKey)
    {
        return $this->hasMany($data,$model,$localKey,$ModelKey);
    }

    /*
     * A表:B表为一对多关系
     * 关联查询，对已查询出的A表数据操作
     * @param data array A表查询到的数据
     * @param model string B表
     * @param localKey string A表主键
     * @param ModelKey string B表中的外键(对应A表主键)
     * @return array A表数据关联B表后的数据
     */
    public function hasMany(array $data,string $model,string $localKey,string $ModelKey):array
    {
        $model = strtolower($model);
        $dataIDs = array_column($data,$localKey);
        $dataB = $this->table($model)
            ->where([$ModelKey,"IN",implode(",",$dataIDs)])
            ->find();
        $dataBKeys = array_column($dataB,$ModelKey);
        $dataB = array_combine($dataBKeys,$dataB);
        foreach($data as &$v){
            if(isset( $dataB[$v[$localKey]] )){
                $v[$model] = $dataB[$v[$localKey]];
            }
        }
		return $data;
    }
    
    /*
     * A表:B表为多对多关系(C表为关系表)
     * @param data array 
     * @param model string
     * @param middleModel string
     * @param localKey string/int
     * @param modelKey string/int
     * @return array 
     */
    public function toMany(array $data,string $model,string $middleModel,string $localKey,string $modelKey):array
    {
        $dataIDs = array_column($data,"id");
        $data = array_combine($dataIDs,$data);
        
        $middleModel = strtolower($middleModel);
        $dataM = $this
            ->table($middleModel)
            ->where([$localKey,"IN","('".implode("','",$dataIDs)."')"])
            ->find();
        $dataMKeys = array_column($dataM,$modelKey);
       
        $model = strtolower($model);               
        $dataB = $this
            ->table($model)
            ->where(["id","IN","('".implode("','",$dataMKeys)."')"])
            ->find();
        $dataBIDs = array_column($dataB,"id");
        $dataB = array_combine($dataBIDs,$dataB);
        
        $resArr = $this->putValueToManyArray($dataM,$data,$dataB,$localKey,$modelKey,$model);
        return $resArr;
    }

    /*
     * A表:B表为多对多关系(C表为关系表)
     * @param dataM array 关系表数据
     * @param data array A表数据
     * @param dataB array B表数据
     * @param localKey string/int A表外键
     * @param modelKey string/int B表外键
     * @param model string B表名
     * @return array
     */
    protected function putValueToManyArray(array $dataM,array $data,array $dataB,string $localKey,string $modelKey,string $model){
        foreach($dataM as $singleData){
            $dataIndex = $singleData[$modelKey];
            if(isset($dataB[$dataIndex])){
                $temp = $dataB[$dataIndex];
                $data[$singleData[$localKey]][$model][] = $temp;
            }else{
                $data[$singleData[$localKey]][$model][] = [["title"=>"暂无数据"]];
            }
        }
        return $data;
    }
    

    /*
     * A表:B表为一对多关系
     * @param dataModel array B表数据
     * @param dataModelKeys array B表中外键列单独组成的数组
     * @param dataCurrent array A表数据
     * @param dataCurrentIDs array A表中主键列单独组成的数组
     * @param model string B表名
     * @return array A表数据关联B表后的数据
     */
    protected function putValueToArray(array $dataB,string $dataBKeys,array $dataA,array $dataAIDs,string $model):array
    {
        for( $i=0;$i<count($dataBKeys);$i++ ){
            if( false!==($index=array_search($dataBKeys[$i],$dataAIDs)) ){
                $dataA[$index][$model][] = $dataB[$i];
            }
        }
        return $dataA;
    }
}
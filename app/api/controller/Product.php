<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 10:30
 */
declare(strict_types=1);
namespace app\api\controller;

use app\libs\validate\ArticleAddValidate;
use app\libs\validate\StatusValidate;
use libs\Request;

class Product extends BaseController
{
    protected $beforeActionList = [
        "add"=>"defaultLoginCheck",
        "addPro"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck"
    ];

    public function __construct()
    {
        $this->model = new \app\api\model\Product();
    }

    /*
     * 添加记录（多图产品，img_id1，img_id2，img_id3，img_id4，img_id5）
     * RequestMethod POST
     * @param id,title,type,slug,content,keyword,description,cate_id,img_id1，img_id2，img_id3，img_id4，img_id5,comment,stick
     * @return void
     */
    public function addPro()
    {
        (new ArticleAddValidate())->goCheck();
        $data = Request::postMany(["title","type","slug","price","sales","content","keyword","description","cate_id","img_id1","img_id2","img_id3","img_id4","img_id5","comment","stick"]);
        $data["img_id"] = 0;
        for($i=1;$i<6;$i++){
            if($data["img_id".$i]){
                $temparr[] = $data["img_id".$i];
                if( 0 == $data["img_id"] ){
                    $data["img_id"] = $data["img_id".$i];
                }
            }
            unset($data["img_id".$i]);
        }
        $data["imgs"] = implode(",",$temparr);
        $data["comment"] = ("on"==$data["comment"])?1:0;
        $data["stick"]   = ("on"==$data["stick"])?1:0;
        $res = $this->model->add($data);
        DBException($res,"添加产品失败");
        return status(true,"添加成功");
    }

    /*
     * 更新记录
     * RequestMethod POST
     * @param id,title,type,slug,price,sales,content,keyword,description,cate_id,img_id,comment,stick
     * @return void
     */
    public function updatePro()
    {
        (new ArticleAddValidate())->goCheck();
        $id = Request::post("id");
        $data = Request::postMany(["title","type","slug","price","sales","content","keyword","description","cate_id","img_id1","img_id2","img_id3","img_id4","img_id5","comment","stick"]);
        $data["img_id"] = 0;
        for($i=1;$i<6;$i++){
            if($data["img_id".$i]){
                $temparr[] = $data["img_id".$i];
                if( 0 == $data["img_id"] ){
                    $data["img_id"] = $data["img_id".$i];
                }
            }
            unset($data["img_id".$i]);
        }
        $data["imgs"] = implode(",",$temparr);
        $data["stick"] = ("on"==$data["stick"])?"1":"0";
        $data["comment"] = ("on"==$data["comment"])?"1":"0";
        $res = $this->model->updateByID(intval($id),$data);
        DBException($res,"更新文章失败");
        return status(true,"更新成功");
    }

    /*
     * 添加记录（不是多图产品）
     * RequestMethod POST
     * @param id,title,type,slug,content,keyword,description,cate_id,img_id,comment,stick
     * @return void
     */
    public function add()
    {
        (new ArticleAddValidate())->goCheck();
        $data = Request::postMany(["title","type","slug","price","sales","content","keyword","description","cate_id","img_id","comment","stick"]);
        $data["comment"] = ("on"==$data["comment"])?1:0;
        $data["stick"]   = ("on"==$data["stick"])?1:0;
        $res = $this->model->add($data);
        DBException($res,"添加产品失败");
        return status(true,"添加成功");
    }

    /*
     * 更新记录
     * RequestMethod POST
     * @param id,title,type,slug,price,sales,content,keyword,description,cate_id,img_id,comment,stick
     * @return void
     */
    public function update()
    {
        (new ArticleAddValidate())->goCheck();
        $aid = Request::post("id");
        $data = Request::postMany(["title","type","slug","price","sales","content","keyword","description","cate_id","img_id","comment","stick"]);
        $data["stick"] = ("on"==$data["stick"])?"1":"0";
        $data["comment"] = ("on"==$data["comment"])?"1":"0";
        $res = $this->model->updateByID(intval($aid),$data);
        DBException($res,"更新文章失败");
        return status(true,"更新成功");
    }
}
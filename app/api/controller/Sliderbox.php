<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/24
 * Time: 6:55
 */
declare(strict_types=1);
namespace app\api\controller;

use app\api\exception\ParameterException;
use app\libs\validate\AdsAddValidate;
use app\libs\validate\ListOrderValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Sliderbox extends BaseController
{
    protected $beforeActionList = [
        "addImage"=>"defaultLoginCheck",
        "update"=>"defaultLoginCheck"
    ];

    protected $model2;
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Sliderbox();
        $this->model2= new \app\api\model\Sliderimg();
    }

    /*
     * 添加广告图片
     * RequestMethod POST
     * @param aid,id,img_alt,img_id,target_url,target,listorder,description
     * @return void
     */
    public function addImage()
    {
        (new AdsAddValidate())->goCheck();
        $data = Request::postMany(["sid","id","img_alt","img_id","target_url","target","listorder","description"]);
        $res = $this->model2->add($data);
        if(!$res){
            throw new ParameterException("添加广告图片失败");
        }
        return status(true,"添加广告图片成功");
    }

    /*
     * 更新广告图片，同上
     */
    public function update()
    {
        (new AdsAddValidate())->goCheck();
        $data = Request::postMany(["img_alt","img_id","target_url","target","listorder","description"]);
        $id = Request::post("id");
        $data["target"] = $data["target"]?1:0;

        $res = $this->model2->updateByID(intval($id),$data);
        if(!$res){
            throw new ParameterException("更新广告图片失败");
        }
        return status(true,"更新广告图片成功");
    }


}
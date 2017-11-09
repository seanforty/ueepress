<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 2017/10/24
 * Time: 6:56
 */
declare(strict_types=1);
namespace app\admin\controller;


use app\api\exception\DBOperationException;
use app\api\model\Image;
use app\libs\validate\MustBePostiveNotRequiredValidate;
use app\libs\validate\MustBePostiveValidate;
use libs\Request;

class Sliderbox extends BaseController
{
    protected $model2;
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\api\model\Sliderbox();
        $this->model2= new \app\api\model\Sliderimg();
    }

    /*
     * 广告管理页面
     * @param int id 广告组ID
     * @return void
     */
    public function getList()
    {
        (new MustBePostiveNotRequiredValidate())->goCheck();
        $aid = Request::get("id");
        if(!$aid){
            $firstRecord = $this->model->getOne();
            $aid = $firstRecord?intval($firstRecord["id"]):0;
        }else{
            $aid = intval($aid);
        }
        $sliderStr = $this->getSliderBox($aid);
        $this->assign("sliderstr",$sliderStr);
        $this->assign("aid",$aid);
        $sliderImgs = $this->model2->getImgs(["sid","=",$aid]);
        $this->assign("adlist",$sliderImgs);
        $this->display("slider-list");
    }

    /*
     * 获取广告位列表，以<option></option>格式的字符串，放在<select></select>之间
     * @param int aid 当前默认选中广告组ID
     * @return string
     */
    public function getSliderBox(int $aid):string
    {
        $sliderStr = "";
        $data = $this->model->find();
        if(!$data){
            return $sliderStr .= '<option value="0">暂无数据</option>';
        }
        foreach ($data as $v)
        {
            if($aid == $v["id"]){
                $sliderStr .= sprintf('<option value="%s" selected>%s</option>',$v['id'],$v['title']);
            }else{
                $sliderStr .= sprintf('<option value="%s">%s</option>',$v['id'],$v['title']);
            }

        }
        return $sliderStr;
    }

    /*
     * 添加广告页面
     * RequestMethod GET
     * @param int id 广告组ID
     * return void
     */
    public function add()
    {
        (new MustBePostiveValidate())->goCheck();
        $aid = Request::get("id");
        $this->assign("aid",$aid);
        $this->display("slider-add");
    }

    /*
     * 更新广告页面
     * Request GET
     * @param int id 广告项ID
     * @return void
     */
    public function update()
    {
        (new MustBePostiveValidate())->goCheck();
        $id = Request::get("id");
        $data = $this->model2->get(intval($id));
        DBException($data,"该广告项不存在");
        $image = (new Image())->get(intval($data["img_id"]));
        $data["image"] = $image;
        $this->assign("data",$data);
        $this->display("slider-update");
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/27
 * Time: 13:50
 */

namespace app\index\controller;

use app\api\model\Menusite;
use app\api\model\Siteinfo;
use app\api\model\Sliderbox;
use libs\mvc\Controller;

class BaseController extends Controller
{
    protected $model = null;
    protected $siteInfo = null; //文字设置
    protected $sliderBox     = null; //图片
    protected $sMenu = null; //菜单

    public function __construct()
    {
        $this->siteInfo  = new Siteinfo();
        $this->sliderBox = new Sliderbox();
        $this->smenu     = new Menusite();

        $this->getHeader();
        $this->getFooter();
        $this->getMenu();
        $this->getAds();
    }

    /*
     * 获取header部位标题/关键词和描述信息
     */
    protected function getHeader()
    {
        $header = [];
        //顶部信息
        $header["sitename"] = $this->siteInfo->getValueByKey("sitename");
        $header["sitesubtitle"] = $this->siteInfo->getValueByKey("sitesubtitle");
        $header["headerwelcome"] = $this->siteInfo->getValueByKey("headerwelcome");
        $header["headercontact"] = $this->siteInfo->getValueByKey("headercontact");

        //顶部菜单
        $header["headermenutitle1"] = $this->siteInfo->getValueByKey("headermenutitle1");
        $header["headermenulink1"] = $this->siteInfo->getValueByKey("headermenulink1");
        $header["headermenutitle2"] = $this->siteInfo->getValueByKey("headermenutitle2");
        $header["headermenulink2"] = $this->siteInfo->getValueByKey("headermenulink2");
        $header["headermenutitle3"] = $this->siteInfo->getValueByKey("headermenutitle3");
        $header["headermenulink3"] = $this->siteInfo->getValueByKey("headermenulink3");

        //SEO 标题、关键词、描述
        $header["title"] = $this->siteInfo->getValueByKey("title");
        $header["description"] = $this->siteInfo->getValueByKey("description");
        $header["keywords"] = $this->siteInfo->getValueByKey("keywords");

        $this->assign("header",$header);
    }

    /*
     * 获取网站底部信息文字信息
     */
    public function getFooter()
    {
        $footer = [];
        $footer["copyright"] = $this->siteInfo->getValueByKey("copyright");
        $footer["beianhao"]  = $this->siteInfo->getValueByKey("beianhao");
        $footer["footertext"]= $this->siteInfo->getValueByKey("footertext");
        $footer["footercontact"] = $this->siteInfo->getValueByKey("footercontact");
        $this->assign("footer",$footer);
    }

    /*
     * 获取广告/图片信息
     */
    public function getAds()
    {
        $data = [];
        $data["logo"]      = $this->sliderBox->sliderInfo(2); //logo
        $data["sliderbox"] = $this->sliderBox->sliderInfo(1); //幻灯片
        $data["footer_img"]= $this->sliderBox->sliderInfo(5); //网站底部二维码
        $this->assign("ads",$data);
    }

    /*
     * 获取菜单信息
     */
    public function getMenu()
    {
        $menuList = $this->smenu->menuInfo(4);
        $menuList2= $this->smenu->menuInfo(5);
        $this->assign("mainmenu",$menuList);
        $this->assign("mainmenu2",$menuList2);
    }


}
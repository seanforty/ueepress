<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3
 * Time: 9:03
 */

namespace app\api\service;


class Pagination extends \libs\Pagination
{
    public function render()
    {
        //限制当前页在有效范围内
        $this->currentPage = ($this->currentPage<1)?1:$this->currentPage;
        $this->currentPage = ($this->currentPage>$this->totalPage)?$this->totalPage:$this->currentPage;

        //开始页和结尾页
        $startPage = $this->currentPage - floor($this->pageNum/2);
        $startPage = ($startPage<1)?1:$startPage;
        $endPage   = $this->currentPage + floor($this->pageNum/2);
        $endPage   = ($endPage>$this->totalPage)?$this->totalPage:$endPage;

        $pageStr = "";

        if($this->currentPage>1){
            $pageStr .= sprintf('<a href="%s">首页</a>', $this->getUrl(1) );
            $pageStr .= sprintf('<a href="%s">上一页</a>', $this->getUrl($this->currentPage-1) );
        }else{
            $pageStr .= sprintf('<a href="javascript:;">首页</a>', "" );
            $pageStr .= sprintf('<a href="javascript:;">上一页</a>', "" );
        }

        for($i=$startPage;$i<=$endPage;$i++){
            if($i == $this->currentPage){
                $pageStr .= sprintf('<a class="selected">%s</a>',$i);
            }else{
                $pageStr .= sprintf('<a href="%s">%s</a>',$this->getUrl($i),$i);
            }
        }

        if($this->currentPage<$this->totalPage){
            $pageStr .= sprintf('<a href="%s">下一页</a>', $this->getUrl($this->currentPage+1) );
            $pageStr .= sprintf('<a href="%s">尾页</a>', $this->getUrl($this->totalPage) );
        }else{
            $pageStr .= sprintf('<a href="javascript:;">下一页</a>', "");
            $pageStr .= sprintf('<a href="javascript:;">尾页</a>', "");
        }

        $pageStr .= sprintf(" 当前%s/%s页 每页%s条",$this->currentPage,$this->totalPage,$this->pageNum);

        return $pageStr;
    }
}
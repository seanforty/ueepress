<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/20
 * Time: 5:26
 */
declare (strict_types=1);
namespace libs;


class Pagination
{
    /*
     * int totalPage
     * int currentPage
     */
    protected $totalPage;
    protected $currentPage;
    protected $pageNum;
    protected $url;

    public function __construct(array $url,int $totalPage, int $currentPage,int $pageNum=5)
    {
        $this->totalPage   = $totalPage;
        $this->currentPage = $currentPage;
        $this->pageNum     = $pageNum;
        $this->url         = $url;
    }

    /*
     * 重写分页方法
     */
    public function render(){}

    /*
     * 生成对应页码的URL
     * 该类初始化时传入url，格式为 [ "path"="", params=[] ];
     */
    protected function getUrl(int $page)
    {
        $this->url["params"]["page"] = $page;
    }
}
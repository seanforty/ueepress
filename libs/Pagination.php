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

    public function __construct(int $totalPage, int $currentPage,int $pageNum=5)
    {
        $this->totalPage   = $totalPage;
        $this->currentPage = $currentPage;
        $this->pageNum    = $pageNum;
    }

    /*
     * 重写分页方法
     */
    public function render(){}
}
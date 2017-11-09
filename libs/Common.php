<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/6
 * Time: 6:10
 */

declare (strict_types=1);

/*
 * 生成URL
 * smarty模板中使用样例：{{url path="index/index" params=["id"=>1,"page"=>10]}}
 * php文件中使用样例：url([ "path"=>"index/index", "params"=>["id"=>1,"page"=>10] ]);
 * 如pathinfo = [
 *      "path"=>"",
 *      "params"=>["id"=>1]
 * ]
 * @param url array
 * @return string
 */
function url(array $pathinfo):string
{
    return \libs\URL::get($pathinfo);
}



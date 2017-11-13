<?php
declare(strict_types=1);

function hello(string $str, int $id, array $arr):bool
{
    echo $str;
    echo $id+100;
    print_r($arr);
    return true;
}


hello("hello world", 100, ["must"=>"go"]);


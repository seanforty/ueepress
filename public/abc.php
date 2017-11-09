<?php

$routes = [
    [
        "category/10-10/2.html",
        "/category\/([0-9]{1,10})-([0-9]{0,10})\/([0-9]{1,10}).html/"
    ]
];


if(preg_match($routes[0][1],$routes[0][0],$matches)){
    print_r($matches);

}else{
    echo("NO");
}

?>

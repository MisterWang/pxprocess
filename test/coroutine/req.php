<?php
require __DIR__."/../../al.php";

use io\HttpRequest;

function gen($url){
    $fd=fopen($url,'r');
    $req=new HttpRequest();
    $a=yield $req->setUrl($url)->exec();
    echo $a.PHP_EOL;
    return $a;
}

$url="http://index.l/pxprocess/test/coroutine/http.php";
$g1=gen($url);
$g2=gen($url);

// $g1->next();
sleep(2);echo '1'.PHP_EOL;
$g1->send('123');
$g2->send('345');
// $g2->next();


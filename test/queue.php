<?php
require __DIR__."/../al.php";

use mq\emq;

$mq=new emq();
$mq->run(function($item)use($mq){
    echo date('h:i:s').': '.$item.PHP_EOL;
});
<?php
require __DIR__."/../al.php";

use mq\emq;

$mq=new emq();
$mq->run(function($item)use($mq){
    echo $item.PHP_EOL;
});
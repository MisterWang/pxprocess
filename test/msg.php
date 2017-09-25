<?php
require __DIR__."/../al.php";
define('PL',PHP_EOL);

use mem\mqueue;

$mq=new mqueue();
// $mq->write(123);
// $mq->write(456);

var_dump(msg_stat_queue($mq->mq));
echo $mq->read().PHP_EOL;
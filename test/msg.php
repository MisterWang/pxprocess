<?php
require __DIR__."/../al.php";
define('PL',PHP_EOL);

use mem\mqueue;
use mem\shmem;

$mq=new mqueue();
// $mq->write(123);
// $mq->write(456);

var_dump(msg_stat_queue($mq->mq));
echo $mq->read().PHP_EOL;

$sm=new shmem();
echo shmop_size($sm->shm);
echo PHP_EOL;
var_dump($sm);
echo PL;
$sm->write('123dddddddddddddddddddddddddddddddddddd');
echo $sm->read().PHP_EOL;
$sm->write('1ddddddddddddddddddddd');
echo $sm->read().PL;


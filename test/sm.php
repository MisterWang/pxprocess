<?php
require __DIR__."/../al.php";
define('PL',PHP_EOL);

use mem\shmem;

$sm=new shmem();
echo shmop_size($sm->shm);
echo PHP_EOL;
var_dump($sm);
echo PL;
$sm->write('123dddddddddddddddddddddddddddddddddddd');
echo $sm->read().PHP_EOL;
$sm->write('1ddddddddddddddddddddd');
echo $sm->read().PL;


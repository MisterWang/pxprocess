<?php
require __DIR__."/../al.php";

use proc\task;


/**
 * 命名管道通信
 */
for($i=0;$i<6;$i++){
    $h[]=$h1=new task(function($task){
        sleep(1);
        $d=$task->msg->read();
        if($d)echo $d.'-'.getmypid().PHP_EOL;
        // echo $pid.PHP_EOL;
    },task::LOOP);
}

$h2=new task(function($task){
    $task->msg->write("123");
    echo 'write 123'.PHP_EOL;
    sleep(1);
},task::LOOP);

task::wait($status);
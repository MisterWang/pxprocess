<?php
require __DIR__."/../al.php";

use proc\task;


/**
 * 命名管道通信
 * 无法投递到指定task
 */
for($i=0;$i<6;$i++){
    $h[]=new task(function($task){
        // sleep(1);
        $d=$task->msg->read();
        if($d)echo $d.'-'.getmypid();
        // echo $pid.PHP_EOL;
    });
    
}


$h2=new task(function($task){
    $task->msg->write("123\n");
    echo 'write 123'.PHP_EOL;
});
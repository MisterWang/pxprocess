<?php
require __DIR__."/../../al.php";

use mem\redis;
use proc\thread;

error_reporting(E_ALL);

$r1=$rd=new redis();
while(0){
    $rd->lPush('emqueue',mt_rand(1,1<<27));
    sleep(mt_rand(1,7));    
}

$ts=[];
for($i=0;$i<4;$i++){
    $thread=new thread(function(){
        set_exception_handler(function($e){
            echo $e->getMessage().PHP_EOL;
        });
        
        $r1=$rd=new redis();
        while(1){
            // echo 123;
            $rd->lPush('emqueue',mt_rand(1,1<<27));
            sleep(mt_rand(1,7));    
        }
    });
    // $thread->data=$rd;
    $ts[]=$thread;
    $thread->start();
}

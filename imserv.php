<?php
require __DIR__."/../al.php";

use io\skserver;
use io\skclient;
use io\event;

use proc\task;

define("MAX_PROC",4);//进程数

$serv=new skserver();

for($i=0;$i<MAX_PROC;$i++){
    $h[]=new task(function($task)use ($serv){
        //监听socket
        $e=new event($serv->ser,function($fd,$evs,$arg)use($serv){
            if($fdrecv=$serv->accept()){
                echo fgets($fdrecv);
                fwrite($fdrecv,"test\n");
            }
            fclose($fdrecv);
        },event::READ|event::WRITE|event::PERSIST);
    });
}

task::wait($status);

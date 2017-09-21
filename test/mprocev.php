<?php
require __DIR__."/../al.php";

use io\skserver;
use io\skclient;
use io\event;

use proc\task;
/**
 * 多进程结合libevent
 */
$serv=new skserver();
for($i=0;$i<2;$i++){
    $h[]=new task(function($task)use ($serv){
        new event($serv->ser,function($fd,$evs,$arg)use($serv){
            if($fdrecv=$serv->accept()){
                echo fgets($fdrecv);
                fwrite($fdrecv,"test\n");
            }
            fclose($fdrecv);
        },event::READ|event::WRITE|event::PERSIST);
    });
}

task::wait($status);

<?php
require __DIR__."/../al.php";

define('USE_LIBEVENT',1);//使用libevent测试
define('WATCH_DIR',1);//监听测试目录或文件
use io\event;
use proc\task;


/**
 * 监听文件/目录
 */
$f=__DIR__."/test.tmp";
$dir=__DIR__."/";
if(WATCH_DIR)
$wh=new \watch\file($dir,\watch\file::ALL_EVENTS);
else
$wh=new \watch\file($f,\watch\file::ALL_EVENTS);

if(USE_LIBEVENT){
    $e=new event($wh->fd,function($fd,$evs,$args)use($wh){
        $events=$wh->read();
        if($events){
            echo time()."----------------\n";
            echo  var_export($events, 1).PHP_EOL;
        }
        else echo "...\n";
    },event::READ |event::WRITE|event::PERSIST);
}else{
    $task=new task(function($self)use($wh){
        $events=$wh->read();
        if($events)
        echo  var_export($events, 1).PHP_EOL;
        else echo "...\n";
        sleep(1);
    },task::LOOP);
}

task::wait($status);
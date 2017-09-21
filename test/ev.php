<?php
require __DIR__."/../al.php";

use io\event;
use mem\mqueue;
use mem\pipe;

//支持管道，FIFO，套接字，POSIX消息队列，终端，设备等
// $fd=fopen(__DIR__."/test.tmp",'w+');
// $mq=new mqueue(); sysv mq
$fifo=new pipe();
$fd=fopen($fifo->fkey,'w+');
stream_set_blocking($fd,0);
$hd=new event($fd,function($fd,$evs,$args)use($fifo){
    // echo fread($fd,1024);
    // echo $fifo->read().PHP_EOL;
    echo fgetc($fd);
    // echo 123;
},event::WRITE|event::PERSIST);

$h1=new task(function ($self){
    $self->msg->write("123\n");
    sleep(1);
},task::LOOP);
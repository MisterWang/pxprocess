<?php
require __DIR__."/../al.php";

use io\skserver;
use io\event;

/**
 * epoll + socket
 */
$serv=new skserver();
// $serv->accept();
// while(1){
new event($serv->ser,function($fd,$evs,$args)use($serv){
    if($fdrecv=$serv->accept()){
        echo fgets($fdrecv);
        fwrite($fdrecv,"test\n");
    }
    fclose($fdrecv);
},event::READ|event::WRITE|event::PERSIST);
    

// }
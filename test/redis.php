<?php
require __DIR__."/../al.php";

use mem\redis;
use io\HttpRequest;
use proc\thread;
// use proc\task;

$rd=new HttpRequest();
var_dump($rd);

$r1=$rd;
var_dump($r1);

$thread=new thread(function(){
    var_dump($this->data);
});
$thread->data=$r1;
$thread->start();


// $task=new task(function()use($rd){
//     var_dump($rd);
// });
// task::wait($status);
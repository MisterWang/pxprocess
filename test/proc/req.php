<?php

class test {
    public function hahaha($task){
        // $task($this);
        $task();
    }
}


$a=new test();
$a->hahaha(function(){
    var_dump($this);
});
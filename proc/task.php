<?php

namespace proc;

use proc;
/**
 * fork
 * pthread
 * _beginthread
 * 
 * iocp 
 */
class task{
    private $pid;
    private $msg;
    private $exit=1;

    public function __set($name,$val){
        $this->$name=$val;
    }
    public function __get($name){
        return $this->$name;
    }

    public function __construct($task){
        $this->msg=new msg();

        $this->pid=$pid=\pcntl_fork();
        if($pid){
            if(function_exists('setproctitle'))setproctitle('php task');

            $task($this);            
            \pcntl_wait($status);
            exit($status.''.PHP_EOL);
        }
    }
    public function __destruct(){
        
    }
}

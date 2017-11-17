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
class process{
    private $pid;
    private $msg;
    private $exec;

    public function __set($name,$val){
        $this->$name=$val;
    }
    public function __get($name){
        return $this->$name;
    }

    public function __construct($task){
        $this->msg=new msg();
        $this->exec=$task;
    }
    public function __destruct(){
        
    }

    public function start(){
        $this->pid=$pid=\pcntl_fork();
        if($pid==0){
            if(function_exists('setproctitle'))setproctitle('php process');

            $this->run();            
            exit();
        }
    }
    public static function wait(&$status){
        \pcntl_wait($status);
    }

    public function run(){
        $task=$this->exec;
        $task($this);
    }
}

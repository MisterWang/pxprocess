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
    private $exec;
    private $exit=0;
    
    const RUN=0;
    const LOOP=1;

    public function __set($name,$val){
        $this->$name=$val;
    }
    public function __get($name){
        return $this->$name;
    }

    public function __construct($task,$type=self::RUN){
        $this->msg=new msg();
        $this->exec=$task;

        if($type)$this->_loop();
        else $this->_run();
    }
    public function __destruct(){
        
    }
    public static function wait(&$status){
        \pcntl_wait($status);
    }

    private function _run(){
        $task=$this->exec;
        $this->pid=$pid=\pcntl_fork();
        if($pid==0){
            if(function_exists('setproctitle'))setproctitle('php task');

            do{
                $task($this);
            }while($this->exit);

            exit();
        }
    }

    private function _loop(){
        $this->exit=1;
        $this->_run();
    }
}

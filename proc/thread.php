<?php
namespace proc;

class thread extends \Thread{
    private $_func;
    public $data;

    public function __construct($task){
        $this->_func=$task;
    }

    public function run(){
        $task=$this->_func;
        $task();        
    }
}
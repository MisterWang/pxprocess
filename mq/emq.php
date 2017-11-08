<?php
namespace mq;

use mem\redis;
class emq{
    private $_redis;
    private $_key='emqueue';
    private $_exit=1;

    public function __construct(){
        $this->_redis=new redis();
    }

    public function run($task){
        while($this->_exit){
            $task($this->_redis->blPop($this->_key,0)[1]);            
        }
    }
}
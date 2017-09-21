<?php
namespace proc;

class msg{
    private $mem;
    public function __get($name){
        return $this->$name;
    }

    public function __construct(){
        $this->mem=new \mem\pipe();
    }

    public function send(){
        return $this->write();
    }

    public function recv(){
        return $this->read();
    }

    public function read(){
        return $this->mem->read();
    }
    public function write($data){
        return $this->mem->write($data);
    }
}
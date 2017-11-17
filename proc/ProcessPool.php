<?php
namespace proc;

class ProcessPool{

    public function __construct($size){
        
    }

    public function submit($process){

    }
    public function shutdown(){
        process::wait();
    }
}
<?php
namespace mem;

/**
 * shm-sysv
 * syncShareMem
 * -win CreateFileMappingA
 * -uni mmap
 * 
 * semaphore
 * -shm
 * -mq
 */
class shmem{
    private $key;
    public $shm;
    private $size;
    private $hsize;

    private $map;

    public function __construct($bit=19){//默认0.5m
        $this->size=pow(2,$bit);
        $this->hsize=ceil($bit/4);

        $this->key=ftok(__FILE__,'a');
        $this->shm=\shmop_open($this->key,'c',0644,$this->size);
    }
    public function __destruct(){
        // \shmop_delete($this->shm);        
    }
    public function read(){
        $size=\shmop_read($this->shm,0,$this->hsize);
        return \shmop_read($this->shm,$this->hsize,sprintf('%d',$size));
    } 

    public function write($data){
        $len=\shmop_write($this->shm,$data,$this->hsize);
        \shmop_write($this->shm,sprintf('%0'.$this->hsize.'x',$len),0);
    }
}
<?php

namespace io;

class HttpRequest{
    private $fd;
    private $default=array(
        CURLOPT_RETURNTRANSFER=>1
    );
    public function __construct($params=array()){
        if(!$params)$params=$this->default;

        $this->fd=curl_init();
        // if(!$this->fd)exit('...');

        curl_setopt_array($this->fd,$params);
    }
    public function __destruct(){
        // curl_close($this->fd);
    }

    public function set($opt,$val){
        curl_setopt($this->fd,$opt,$val);
        return $this;
    }
    public function setArray($params){
        curl_setopt_array($this->fd,$params);
        return $this;
    }
    public function setAsync(){
        
    }

    public function exec(){
        return curl_exec($this->fd);
    }
    public function close(){
        \curl_close($this->fd);
    }

    /**
     * setUrl
     * setPostField
     * ...
     * 
     * @param [type] $name
     * @param [type] $arguments
     * @return void
     */
    public function __call($name,$arguments){
        if(strpos($name,'set')!==false){
            $name=str_replace('set','',$name);
            $name=preg_replace("/([A-Z])/","_$1",$name);
            $name=strtoupper($name);
            return $this->set(constant('CURLOPT'.$name),$arguments[0]);
        }else
            return $this;
    }
}

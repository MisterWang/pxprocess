<?php
namespace io;

class skclient{
    private $fd;

    private $err;
    private $errno;

    public function __get($name){
        return $this->$name;
    }

    public function __construct($host='127.0.0.1:8182'){
        $this->fd=stream_socket_client($host,$this->errno,$this->err);
    }

    public function close(){
        fclose($this->fd);
    }

    public function write($data){
        return \fwrite($this->fd,$data);
    }

    public function read(){
        return fgets($this->fd);
    }
}
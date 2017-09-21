<?php
namespace io;

class skserver{
    private $ser;
    private $fdrecv;

    private $err;
    private $errno;

    public function __get($name){
        return $this->$name;
    }
    public function __construct($host='127.0.0.1:8182'){
        $this->ser=stream_socket_server($host,$this->errno,$this->err);
    }

    public function accept(){
        if($this->ser)
            return $this->fdrecv=\stream_socket_accept($this->ser);
        else
            exit("$this->errno : $this->err");    
    }

    public function close(){
        fclose($this->fdrecv);
        fclose($this->ser);
    }

    public function write($data){
        return \fwrite($this->fdrecv,$data);
    }

    public function read(){
        return fgets($fdrecv);
    }
}
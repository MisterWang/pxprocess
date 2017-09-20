<?php
namespace mem;

class pipe{
    private $fkey;
    // private $fd;

    public function __construct(){
        $this->fkey="/tmp/pipe";
        if(!file_exists($this->fkey) && !\posix_mkfifo($this->fkey,0644))
            echo \posix_strerror(\posix_get_last_error());
        else{
            // $this->fd=\fopen($this->fkey,'w+');
            // stream_set_blocking($this->fd,0);            
        }
    }
    public function __destruct(){
        // fclose($this->fd);
        // echo getmypid().PHP_EOL;
        // if(file_exists($this->fkey))unlink($this->fkey);
    }

    public function write($data){
        $fd=\fopen($this->fkey,'w');
        \fwrite($fd,$data);
        fclose($fd);
    }

    public function read(){
        $fd=\fopen($this->fkey,'r');

        $data='';
        while($fd && !\feof($fd)){
            $data.=\fread($fd,1024);
        }
        
        fclose($fd);        
        return $data;
    }
}
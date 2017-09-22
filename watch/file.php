<?php
namespace watch;

class file{
    private $fd;
    private $watch;
    
    //http://php.net/manual/en/inotify.constants.php
    const MODFIFY=IN_MODIFY;
    const ACCESS=IN_ACCESS;
    CONST OPEN=IN_OPEN;
    const ALL_EVENTS=IN_ALL_EVENTS;

    public function __get($name){
        return $this->$name;
    }

    public function __construct($file,$mask=self::MODFIFY){
        $this->fd=\inotify_init();
        stream_set_blocking($this->fd,0);
        $this->watch=\inotify_add_watch($this->fd,$file,$mask);
    }
    
    public function read(){
        return \inotify_read($this->fd);
    }
    public function close(){
        \inotify_rm_watch($this->watch);
        fclose($this->fd);
    }
}

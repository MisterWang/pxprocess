<?php
namespace io;

/**
 * libevent
 */
class event{
    private $evbase;
    private $ev;

    const READ=EV_READ;
    const WRITE=EV_WRITE;
    const TIMEOUT=EV_TIMEOUT;
    CONST SIGNAL=EV_SIGNAL;
    CONST PERSIST=EV_PERSIST;

    //A stream, socket resource, or numeric file descriptor; for signal events pass -1 .
    public function __construct($fd,$task,$evs=self::WRITE){
        $this->ev=\event_new();
        // $this->evbase[]=\event_base_new();

        // \event_set($this->ev,$fd,$evs,$task);
        // event_base_set($this->ev,$this->evbase[0]);
        // event_add($this->ev);
        // event_base_loop($this->evbase[0]);
        $this->set($fd,$task,$evs);
    }

    public function callback($fd,$evs,$args){

    }

    public function set($fd,$task,$evs=self::WRITE){
        $this->evbase[]=$evbase=\event_base_new();
        
        \event_set($this->ev,$fd,$evs,$task);
        event_base_set($this->ev,$evbase);
        event_add($this->ev);
        event_base_loop($evbase);
    }
}
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

    public function __construct($fd,$task,$evs=self::WRITE){
        $this->ev=\event_new();
        $this->evbase=\event_base_new();

        \event_set($this->ev,$fd,$evs,$task);
        event_base_set($this->ev,$this->evbase);
        event_add($this->ev);
        event_base_loop($this->evbase);
    }

    public function callback($fd,$evs,$args){

    }
}
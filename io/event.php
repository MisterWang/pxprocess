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
}

// $base=event_base_new();
// $event=event_new();

// $fd=inotify_init();
// $watch=inotify_add_watch($fd,__DIR__."/../test.html",IN_MODIFY|IN_ACCESS|IN_OPEN);

// event_set($event,$fd,EV_READ|EV_WRITE,function($fd,$flag,$base){
//     $events = inotify_read($fd);
//     if ($events) {
//         foreach ($events as $event) {
//             // file_put_contents("e.log",'111');
//             echo  var_export($event, 1).PHP_EOL;
//         }
//     }
// });
// event_base_set($event,$base);
// event_add($event);
// echo '123'.PHP_EOL;
// event_base_loop($base);


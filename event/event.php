<?php
namespace event;

$base=event_base_new();
$event=event_new();

$fd=inotify_init();
$watch=inotify_add_watch($fd,__DIR__."/../test.html",IN_MODIFY|IN_ACCESS|IN_OPEN);

event_set($event,$fd,EV_READ|EV_WRITE,function($fd,$flag,$base){
    $events = inotify_read($fd);
    if ($events) {
        foreach ($events as $event) {
            // file_put_contents("e.log",'111');
            echo  var_export($event, 1).PHP_EOL;
        }
    }
});
event_base_set($event,$base);
event_add($event);
echo '123'.PHP_EOL;
event_base_loop($base);


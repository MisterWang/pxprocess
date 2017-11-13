<?php
namespace watch;

use  watch\EcTime;

class EX{
    static function run($task){
        EcTime::start();

        $task();

        EcTime::end();
        echo EcTime::cost().PHP_EOL;
    }
}
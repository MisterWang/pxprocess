<?php

namespace watch;

class EcTime{

    static private $start;
    static private $end;

    static public function start(){
        self::$start=microtime(1);
    }

    static public function end(){
        self::$end=microtime(1);
    }

    static public function cost(){
        return self::$end-self::$start;
    }
}
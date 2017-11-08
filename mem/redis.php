<?php 
namespace mem;

class redis extends \Redis{
    public function __construct($host='127.0.0.1',$port = 6379, $timeout = 0.0 ){
        ini_set('default_socket_timeout', -1);        
        
        parent::__construct();        
        $this->connect($host,$port,$timeout);
    }
}
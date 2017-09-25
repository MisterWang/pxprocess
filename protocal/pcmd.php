<?php
namespace protocal;

class pcmd{
    const PUSH=1;
    // const GET=2;
    
    static private $_funcs=array(
        PUSH=>array("push","push"),
    );
    static public function register($cmd,$exec){
        self::$_funcs[$cmd]=$exec;
    }
    
    static public function exec($cmd,$args){
        $func=self::$_funcs[$cmd];
        call_user_func_array("self::$func[1]",$args);
    }

    static public function push($data){
        // all fd push
        
    }
}

// cmd::register(cmd::PUSH,function($id,$data){

// });

// cmd::${cmd}
<?php
namespace mem;

class mqueue{
    private $key;
    public $mq;

    const I32=1;
    CONST STR=2;
    CONST ARR=3;
    const OBJ=4;

    public function __construct($key=4396443){
        $this->key=$key;
        $this->mq=msg_get_queue($key);
    }

    /**
     * Undocumented function
     *
     * @return mix
     */
    public function read(){
        $minfo=msg_stat_queue($this->mq);
        if(intval($minfo['msg_qnum'])>0){
            \msg_receive($this->mq,0,$msgtype,1024,$msg,true,MSG_IPC_NOWAIT);            
            return $msg;
        }else
            return null;
    }

    public function write($data){
        return msg_send($this->mq,1,$data,true,false);
    }
}
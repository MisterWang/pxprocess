<?php
namespace protocal;

class msg{
    const format="na*";

    static public function pack($state,$data){
        return pack(self::format,$state,$data);
    }
    static public function unpack($data){
        return unpack(self::format,$data);
    }
}
    
<?php

function getFile(){
    yield $a=file_get_contents(__DIR__.'/test.tmp');
    echo $a;
    return $a;
}
$g=getFile();

// echo $g->send('send');
$g->next();

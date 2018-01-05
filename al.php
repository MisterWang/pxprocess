<?php
spl_autoload_register(function ($class){
    $class=str_replace('\\','/',$class);

    // echo $class;
    require __DIR__.'/'.$class.'.php';
});

// if(class_exists('SyncSharedMemory'))echo 123;
// function cl_autoload_exists(){
    
// }
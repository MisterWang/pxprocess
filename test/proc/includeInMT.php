<?php
require __DIR__."/../../al.php";

use proc\thread;
use proc\ThreadPool;
// use io\HttpRequest;

use watch\EX;

// EcTime::start();
EX::run(function(){

// $req=new HttpRequest();
$pool=new ThreadPool(8);
for($i=0;$i<8;$i++){
    $pool->submit(new thread(function(){
        // $req=new io\HttpRequest();
        // echo $req->setUrl("http://index.l/pxprocess/test/coroutine/http.php")->exec().PHP_EOL;
        var_dump(spl_autoload_functions());
    }));
}
var_dump(spl_autoload_functions());


// while($pool->collect());
$pool->shutdown();

});
// EcTime::end();
// echo EcTime::cost();
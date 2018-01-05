<?php
require __DIR__."/../../al.php";

use io\skclient;
$cli=new skclient("swserv:9000");
$cli->write("helloworld\r\n");
echo $cli->read();
$cli->close();
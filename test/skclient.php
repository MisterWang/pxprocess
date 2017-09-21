<?php
require __DIR__."/../al.php";

use io\skclient;
$cli=new skclient();
$cli->write("111\n");
echo $cli->read();
$cli->close();
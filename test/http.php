<?php
require __DIR__."/../al.php";

use io\HttpRequest;


$req=new \io\HttpRequest();
// echo $req->setUrl('http://www.baidu.com')
//         ->set(CURLOPT_POST,0)
//         // ->setPostfields(array())
//         // ->setSslVerifypeer(0)
//         ->exec();

// $a= $req->setUrl('https://api.github.com/users/MisterWang/starred?access_token=9af7bf83175be9deb8ab5b14d920efb199087667')
echo $req->setUrl('https://api.github.com/user?access_token=9af7bf83175be9deb8ab5b14d920efb199087667')
->set(CURLOPT_POST,0)
// ->setHeader(1)
->setUseragent('123')
->setSslVerifypeer(false)
->exec();

// var_dump($a);
<?php

$str='null';
$sum=0;
for($i=0;$i<strlen($str);$i++){
    // echo sprintf('%x',ord($str[$i]));
    $sum+=ord($str[$i]);
}

echo sprintf('%x',$sum);
echo $sum;

0x1bb;
<?php

include"runData.php";
$arr = array("1,3,4,5,6");
// var_dump($arr);
// exit;
$check = new runData;
$check->selectBet("20230540001",$arr);

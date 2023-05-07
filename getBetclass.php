<?php

include"runData.php";
// $random_number = rand(1, 10);
// echo $random_number;
$userbet =!empty($_POST["betnumber"]) ? $_POST["betnumber"] : "" ;
$draw_period ="20230540001";
$lotterid = 1;
$gameid = 1;
$bettime = date("H:i");
$betdate = date("Ymd");
$betstatus = "unsettle";
$draw_number  = "1,3,4,5,6";
$uid = 3;
$odd = 50;

$insert = new runData;
$insert->insertData($lotterid,$gameid,$bettime,$betdate,$draw_period,$draw_number,$betstatus,$userbet,$uid,$odd);


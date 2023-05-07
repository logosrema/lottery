<?php

class Classconnect{

 public function dbconnect(){
    $dsn = ("mysql:host=localhost;dbname=games");
    $db  = new PDO($dsn,"root","");
    return $db;

 }
   

}

$obeject = new Classconnect;
 $obeject->dbconnect();


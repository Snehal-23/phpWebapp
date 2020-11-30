<?php

$db['host']='localhost';
$db['user']='root';
$db['pswd']='';
$db['database']='bab_2312';
foreach($db as $key=>$value){
    define(strtoupper($key),$value);
}
$connection=mysqli_connect(HOST,USER,PSWD,DATABASE);
 if(!$connection){
     echo "failed" ;
     //    die('failed'.mysqli_error());
}








?>
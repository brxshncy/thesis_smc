<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "icdrrmo";


$conn = mysqli_connect($host,$user,$pw,$db);


if(!$conn){
	die("Connection Failed:" .mysqli_connect_error()); 
}


?>
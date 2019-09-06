<?php
session_start();
include 'include/db.php';
$id = $_GET['id'];
$query = "DELETE FROM locatorslip_request WHERE locatorslip_request.id = '$id' ";
$exec = $conn->query($query);
if($exec){
	$_SESSION['msg-del'] = "Request Rejected";
	header("location:locator_request.php");
}else{
	echo "Error";
}

?>
<?php
session_start();
include 'include/db.php';
$id = $_GET['id'];
$accept = "SELECT * FROM locatorslip_request WHERE id= '$id' ";
$result = $conn->query($accept);
$field_count = $result->field_count;
if($field_count>0){
	while($row = mysqli_fetch_assoc($result)){
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$username = $row['username'];
		$contact = $row['contact'];
		$destination = $row['destination'];
		$purpose = $row['purpose'];
		$date = $row['date'];
		$time = $row['time'];
		$time_return = $row['time_return'];
		$status = $row['status'];

		$query = "INSERT INTO locatorslip_record
		(firstname,lastname,username,contact,destination,purpose,date,time,time_return,status) 
		VALUES 
		('$firstname','$lastname','$username','$contact','$destination','$purpose','$date','$time','$time_return','$status') ";
	}
	$del = "DELETE FROM locatorslip_request WHERE locatorslip_request.id= '$id'";
	$execute = $conn->query($query);
	$execute2 = $conn->query($del);
	if($execute || $execute2){
		$_SESSION['msg'] = "Request Approved";
		header("location:locator_request.php");
	}else{
		echo "Error occured";
	}
}else{
	echo "Unknown Error";
}

?>
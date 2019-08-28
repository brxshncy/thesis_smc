<?php
session_start();
include 'db.php';

if(isset($_POST['submit'])){
	
if(is_array($_POST['status']) || is_object($_POST['status'])){
	foreach($_POST['status'] as $id=>$status){
		$name = $_POST['fullname'][$id];
		$contact = $_POST['contact'][$id];
		$date = date("Y-m-d H:i:s");

		$insert = "INSERT INTO unit_attendance (name,date,contact,status) VALUES ('$name','$date','$contact','$status')";
		$result = mysqli_query($conn,$insert);

		$_SESSION['message'] = "Attendance Noted!";
		$_SESSION['msg_type'] = "success";


		if($result){
			header("Location:../operation_attendance.php");
		}
	}
}
}
	

?>
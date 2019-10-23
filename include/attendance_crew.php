<?php
session_start();
include 'db.php';

if(isset($_POST['submit'])){
	foreach($_POST['status'] as $id=>$status){
		$name = $_POST['fullname'][$id];
		$team = $_POST['team'][$id];
		$date = date("Y-m-d");

		$insert = "INSERT INTO unit_attendance (rescuer_id,team_id,date,status) VALUES ('$name','$team','$date','$status')";
		$result = mysqli_query($conn,$insert) or trigger_error(mysqli_error($conn)." ".$insert);
		

	}
		
		$_SESSION['message'] = "There is an error";
		$_SESSION['msg_type'] = "error";
		$_session['attendance'] = "Attendance Error";

		if($result){
			$_SESSION['message'] = "Attendance Noted";
			$_SESSION['msg_type'] = "success";
			$_SESSION['attendance'] = "Attendance Noted!";
			header("Location:../operation_attendance.php");
			exit();
		}


}
	

?>
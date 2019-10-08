<?php
session_start();
include 'db.php';

if(isset($_POST['submit'])){
	foreach($_POST['status'] as $id=>$status){
		$name = $_POST['fullname'][$id];
		$contact = $_POST['contact'][$id];
		$date = date("Y-m-d H:i:s");
		$insert = "INSERT INTO unit_attendance (rescuer_id,date,team_id,status) VALUES ('$name','$date','$contact','$status')";
		$result = mysqli_query($conn,$insert) or trigger_error(mysqli_error($conn)." ".$insert);
	}
		

		$_SESSION['message'] = "Attendance Noted!";
		$_SESSION['msg_type'] = "success";


		if($result){
			header("Location:../operation_attendance.php");
			$_SESSION['message'] = "Attendance Noted!";
		$_SESSION['msg_type'] = "success";
		$_SESSION['attendance'] = "Attendance Noted";
		}
	

}
	

?>
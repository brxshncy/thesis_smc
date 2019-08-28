<?php
session_start();
include 'db.php';
global $conn;

	if(isset($_POST['save'])){
		$employee_name = mysqli_escape_string($conn,$_POST['employee_name']);
		$destination =  mysqli_escape_string($conn,$_POST['destination']);
		$purpose =  mysqli_escape_string($conn,$_POST['purpose']);
		$date =  mysqli_escape_string($conn,$_POST['date']);
		$time = mysqli_escape_string($conn,$_POST['time']);

		$insert = $conn->prepare("INSERT INTO locator_slip (employee_name,destination,purpose,date,time) VALUES (?,?,?,?,?)");

			$_SESSION['message'] = "Crew Member approved";
			$_SESSION['msg_type'] = "success";


		if($insert !== FALSE){
			$insert->bind_param("sssss",$employee_name,$destination,$purpose,$date,$time);
			$insert->execute();
			$insert->close();
			header("location:../locator.php");
		}
		else{
			die('prepare() failed:'.htmlspecialchars($conn->error));
		}
	}

?>
 
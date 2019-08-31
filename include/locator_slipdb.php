<?php
session_start();
include 'db.php';
	if(isset($_POST['submit'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$contact = $_POST['contact'];
		$destination = $_POST['destination'];
		$purpose = $_POST['purpose'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$time_return = $_POST['time_return'];

		$insert =  "INSERT INTO locatorslip_request (firstname,lastname,username,contact,destination,purpose,date,time,time_return)
		 VALUES   								 ('$firstname','$lastname','$username','$contact','$destination','$purpose','$date','$time','$time_return')";
		$query = $conn->query($insert);

			$_SESSION['request_sent'] = "Request has been sent!";

			if($query){
				header("location:../locator_slip.php");
			}
			else{
				echo "Error:".$query."<br>".mysqli_error($conn);
			}
	}
?>
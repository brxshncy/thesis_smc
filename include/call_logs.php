<?php
require ('db.php');
session_start();
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$reason_call = $_POST['reason_call'];
		$number_caller = $_POST['number_caller'];
		$date_call = $_POST['date_call'];
		$time_call = $_POST['time_call'];
		$address_incident = $_POST['address_incident'];

		$insert_call = "INSERT INTO call_logs (name,reason_call,number_caller,date_call,time_call,address_incident) VALUES ('$name' ,'$reason_call' ,'$number_caller','$date_call' ,'$time_call', '$address_incident' )";
		$result = $conn->query($insert_call) or trigger_error(mysqli_error($conn)." ".$insert_call);

		if($result){
			 $_SESSION['insert'] = "Saved successfully!";
			 header("location:../communication_monitoring.php");

		}
	}
?>
<?php
require ('db.php');
session_start();
	if(isset($_POST['submit'])){
		$patient = $_POST['patient'];
		$caller =  $_POST['caller'];
		$reason_call = $_POST['reason_call'];
		$number_caller = $_POST['number_caller'];
		$date_call = $_POST['date_call'];
		$call_time = $_POST['call_time'];
		$address_incident = $_POST['address_incident'];
		$hospital = $_POST['hospital'];
		$notification = $_POST['notification'];

		$insert_call = "INSERT INTO call_logs 
		(patient,caller,reason_call,number_caller,date_call,call_time,address_incident,hospital,notification) 
		VALUES 
		('$patient' ,'$caller' ,'$reason_call','$number_caller','$date_call','$call_time','$address_incident','$hospital','$notification')";
		$result = $conn->query($insert_call) or trigger_error(mysqli_error($conn)." ".$insert_call);

		if($result){
			 $_SESSION['insert'] = "Saved successfully!";
			 header("location:../communication_monitoring.php");

		}
	}
?>
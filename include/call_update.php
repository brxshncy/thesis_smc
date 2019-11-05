<?php 
session_start();
require('db.php');

if(isset($_POST['update'])){
	$name = $_POST['name'];
	$reason_call = $_POST['reason_call'];
	$number_caller = $_POST['number_caller'];
	$date_call = $_POST['date_call'];
	$time_call = $_POST['time_call'];
	$address_incident = $_POST['address_incident'];
	$id = $_POST['update_id'];

	$update = "

	UPDATE call_logs
	SET
	name = '$name ',
	reason_call = '$reason_call',
	number_caller = '$number_caller',
	date_call= '$date_call',
	time_call = '$time_call',
	address_incident = '$address_incident'
	WHERE id = '$id'
	";

	$result = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

	if($result){
		$_SESSION['update'] = "Updated sucessfully!";
		header("location:../communication_monitoring.php");
		exit();
	}

}
?>
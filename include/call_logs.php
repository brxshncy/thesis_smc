<?php 
require('db.php');

if(isset($_POST)){
	$p_fname = $_POST['p_fname'];
	$p_lname = $_POST['p_lname'];
	$c_fname = $_POST['c_fname'];
	$c_lname = $_POST['c_lname'];
	$reason_call = $_POST['reason_call'];
	$number_caller = $_POST['number_caller'];
	$date_call = $_POST['date_call'];
	$call_time = $_POST['call_time'];
	$address_incident = $_POST['address_incident'];
	$hospital = $_POST['hospital'];
	$notification = $_POST['notification'];

	$insert = "INSERT INTO emergency_call 
	(p_fname,p_lname,c_fname,c_lname,reason_call,number_caller,date_call,call_time,address_incident,hospital,notification) VALUES
	('$p_fname','$p_lname','$c_fname','$c_lname','$reason_call','$number_caller','$date_call','$call_time','$address_incident','$hospital','$notification')";
	$insert_run = $conn->query($insert);
	if($insert_run){
		echo "Emergency Forwarded!";
	}
	else{
		trigger_error(mysqli_error($conn)." ".$insert_run);
	}
}else{
	echo "No data";
}

?>
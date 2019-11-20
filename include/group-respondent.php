<?php
session_start();
require'db.php';


if(isset($_POST['upload'])){

	$unit_name = $_POST['unit_name'];
	$vehicle_name = $_POST['vehicle_name'];
	$time_in = $_POST['time_in'];
	$time_out = $_POST['time_out'];


	$insert = "INSERT INTO unit_name(unit_name,vehicle_name,time_in,time_out) VALUES ('$unit_name ','$vehicle_name','$time_in','$time_out')";

	$_SESSION['message'] = "Team has been added";
	$_SESSION['msg_type'] = "success";

	

	if(mysqli_query($conn,$insert)){
		header("location:../pcr-addteam.php");
	}
	else{
		echo "Error:" .$insert. "<br>" .mysqli_error($conn);
	}


}

?>

<?php
session_start();
require'db.php';

if(isset($_POST['upload'])){

	$unit_name = $_POST['unit_name'];
	$vehicle_name = $_POST['vehicle_name'];
	$transport_officer = $_POST['transport_officer'];
	$treatment_officer = $_POST['treatment_officer'];

	$insert = "INSERT INTO unit_name(unit_name,vehicle_name,transport_officer,treatment_officer) VALUES ('$unit_name ','$vehicle_name','$transport_officer','$treatment_officer')";

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

<?php
session_start();
include 'db.php';
ini_set('display_errors',1);
error_reporting(E_ALL);

	if(isset($_POST['upload'])){
		$vehicle = $_POST['vehicle_name'];
		$plate_no = $_POST['plate_no'];

		$qry = "INSERT INTO vehicle (vehicle_name, plate_no ) VALUES ('$vehicle','$plate_no')";
		$result = $conn->query($qry) or  trigger_error(mysqli_error($conn)." ".$qry);;	

		if($result){
			$_SESSION['message'] = "Vehicle Added";
			$_SESSION['msg_type'] = "success";
			header("location:../pcr-addteam.php");
		}
	}
?>
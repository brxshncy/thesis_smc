<?php
session_start();
include 'db.php';
global $conn;

if(isset($_POST['upload'])){
	$id = $_POST['id'];
			$unit_name = $_POST['unit_name'];
			$vehicle_name = $_POST['vehicle_name'];
			$edit_in = $_POST['edit_in'];
			$edit_out = $_POST['edit_out'];

		$update = "UPDATE unit_name 
					SET 
					unit_name ='$unit_name ',
					vehicle_name ='$vehicle_name',
					time_in = '$edit_in',
					time_out = '$edit_out'
					WHERE id = '$id' ";

					
					

	$result = mysqli_query($conn,$update) or trigger_error(mysqli_error($conn)." ".$update);

	if($result){
		header("location:../pcr-addteam.php");
				$_SESSION['message'] = "Record has been Updated";
				$_SESSION['msg_type'] = "info";
	}

}	

?>
<?php
session_start();
include 'db.php';
global $conn;

if(isset($_POST['upload'])){
	$id = $_POST['id'];
			$unit_name = $_POST['unit_name'];
			$vehicle_name = $_POST['vehicle_name'];
			$transport_officer = $_POST['transport_officer'];
			$treatment_officer = $_POST['treatment_officer'];

						$update = "UPDATE unit_name SET unit_name ='$unit_name ',
						vehicle_name ='$vehicle_name',
						transport_officer ='$transport_officer',
						treatment_officer ='$treatment_officer' WHERE id = '$id' ";

	$result = mysqli_query($conn,$update);

		if (!mysqli_query($conn,$update))
  		{
				  echo("Error description: " . mysqli_error($conn));
	  }
				else{
					echo '<script> alert(Updated Succesfully!); </script>';
					header("location:../pcr-addteam.php");
					$_SESSION['message'] = "Record has been Updated";
					$_SESSION['msg_type'] = "info";
				}
				}
			?>

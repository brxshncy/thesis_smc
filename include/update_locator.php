<?php
session_start();
include 'db.php';
global $conn;

if(isset($_POST['save'])){
	$id = $_POST['id'];
			$id = $_POST['id'];
			$employee_name = $_POST['employee_name'];
			$destination = $_POST['destination'];
			$purpose = $_POST['purpose'];
			$date = $_POST['date'];
			$time = $_POST['time'];


						$update = "UPDATE locator_slip SET employee_name ='$employee_name ',
						destination ='$destination',
						purpose ='$purpose',
						date ='$date',
						time = '$time'
						WHERE id = '$id' ";

	$result = mysqli_query($conn,$update);

		if (!mysqli_query($conn,$update))
  		{
				  echo("Error description: " . mysqli_error($conn));
	  }
				else{
					echo '<script> alert(Updated Succesfully!); </script>';
					header("location:../locator.php");
					$_SESSION['message'] = "Slip has been Edited Succesfully";
					$_SESSION['msg_type'] = "info";
				}
				}
			?>

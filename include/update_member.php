<?php
	session_start();
	include 'db.php';
	global $conn;

	if(isset($_POST['update'])){
		$edit_id = $_POST['update_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contact= $_POST['contact'];
		$gender= $_POST['gender'];
		$address  = $_POST['address'];

		$update = "UPDATE assign_rescuer SET 
					firstname = '$firstname',
					lastname = '$lastname',
					contact = '$contact',
					gender = '$gender',
					address = '$address' 
					WHERE id = '$edit_id'";

					$result = mysqli_query($conn,$update);

		if (!mysqli_query($conn,$update))
  		{
				  echo("Error description: " . mysqli_error($conn));
	  }
				else{
					echo '<script> alert(Updated Succesfully!); </script>';
					header("location:../pcr-addteam.php");
					$_SESSION['message'] = "Members of the Team has been Updated";
					$_SESSION['msg_type'] = "info";
				}
		}

			
	
?>


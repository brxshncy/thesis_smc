<?php
session_start();
include 'db.php';

		if(isset($_POST['upload'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];
			$contact = $_POST['contact'];
			$gender = $_POST['gender'];
			$username = $_POST['username'];
			$unit_name = $_POST['team_name'];



			

			$insert = "INSERT INTO assign_rescuer(firstname,lastname,address,contact,gender,username,unit_name) VALUES ('$firstname','$lastname','$address','$contact','$gender','$username','$unit_name') ";

			$_SESSION['message'] = "Member has been added";
			$_SESSION['msg_type'] = "success";

			if(mysqli_query($conn,$insert)){
				echo "<script> alert('Member successfully Added!'); </script>";
				header("location:../pcr-addteam.php");
			}else{
				echo "Error: " . $insert . "<br>" . mysqli_error($conn);
			}
		}

?>
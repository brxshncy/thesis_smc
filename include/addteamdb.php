<?php
session_start();
include 'db.php';

		if(isset($_POST['upload'])){
			$fullname = $_POST['fullname'];
			$gender = $_POST['gender'];
			$contact = $_POST['contact'];
			$team_name = $_POST['team_name'];
			$address = $_POST['address'];
			/*$profile_pic = $_FILES['profile_pic'];
			

			$fileName = $profile_pic['file']['name'];
			$fileTmpName = $profile_pic['file']['tmp_name'];
			$fileSize = $profile_pic['file']['size'];
			$fileError = $profile_pic['file']['error'];
			$fileType = $profile_pic['file']['type'];

			$fileExt = explode();*/


			

			$insert = "INSERT INTO unit_respondent(fullname,gender,contact,unit_name,address) VALUES ('$fullname','$gender','$contact','$team_name','$address') ";

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
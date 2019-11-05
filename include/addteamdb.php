<?php
session_start();
include 'db.php';

		if(isset($_POST['upload'])){
			$rescuers_id = $_POST['members'];
			$team_id = $_POST['team_name'];
			$role = $_POST['role'];
			$insert = "INSERT INTO teams(rescuers_id,team_id,role) VALUES ('$rescuers_id','$team_id','$role')";
			$_SESSION['message'] = "Member has been set";
			$_SESSION['msg_type'] = "success";
			if(mysqli_query($conn,$insert)){
				echo "<script> alert('Member successfully Added!'); </script>";

				$update = "UPDATE rescuers SET team_unit = '$team_id', role = '$role' WHERE id = '$rescuers_id' ";
				if(mysqli_query($conn,$update)){
					header("location:../pcr-addteam.php");
				}
				
			}else{	
				echo "Error: " . $insert . "<br>" . mysqli_error($conn);
			}
		}

?>
<?php
session_start();
include 'db.php';

		if(isset($_POST['upload'])){
			$rescuers_id = $_POST['members'];
			$team_id = $_POST['team_name'];
			$role = $_POST['role'];
			$role_array = array();

			$checkrole = "SELECT role FROM teams WHERE role ='Transport Officer' OR role ='Treatment Officer' AND team_id = '$team_id'  ";
			$query_checkrole = mysqli_query($conn,$checkrole);
			while ($row=mysqli_fetch_assoc($query_checkrole)){
				/*	if($row['role'] == 'Treatment Officer' || $row['role'] == 'Transport Officer'){
						echo "role has been ";
					}
					else{
						echo "fuck";
					}*/
					$role_duplicate = $row['role'];
					echo $role_duplicate;

					array_push($role_array,$role_duplicate);

			}
			print_r($role_array);
			if($role_array['role'] == 'Treatment Officer' || $role_array['role'] == 'Transport Officer'){
						echo "role has been ";
					}
					else{
						echo "fuck";
					}
			
			
			

			/*$insert = "INSERT INTO teams(rescuers_id,team_id,role) VALUES ('$rescuers_id','$team_id','$role')";



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
			}*/
		}

?>
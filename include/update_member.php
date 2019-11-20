<?php
	session_start();
	include 'db.php';
	global $conn;

	if(isset($_POST['update'])){
		$edit_id = $_POST['update_id'];
		$team_id = $_POST['team_unit'];
		$username = $_POST['username'];
		$role = $_POST['role'];	

		$update = "UPDATE rescuers SET 
					team_unit = '$team_id',
					role = '$role'
					WHERE id = '$edit_id'"
					;
					var_dump($role);
					$result = mysqli_query($conn,$update) or trigger_error(mysqli_error($conn)." ".$update);

		if (!mysqli_query($conn,$update))
  		{
				  echo("Error description: " . mysqli_error($conn));
	  }
				else{
					$qry = "UPDATE rescuers SET team_unit = '$team_id' WHERE username = '$username' ";
					$result1 = $conn->query($qry) or trigger_error(mysqli_error($conn)." ".$qry);
					if($result1){
							header("location:../pcr-addteam.php");
							$_SESSION['message'] = "Members of the Team has been Updated";
							$_SESSION['msg_type'] = "info";
					}
					
				}
		}

			
	
?>


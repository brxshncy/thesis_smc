
<?php
//SESSION START
session_start();
//REQUIRE DB
require "db.php";

//IF DELETE IS CLIKED
if(isset($_GET['delete'])){
			$id = $_GET['delete']; 
			$delete = "DELETE FROM assign_rescuer WHERE id = $id";
			
			//SESSION MESSAGE
			if(mysqli_query($conn,$delete)){
				$_SESSION['message'] = "Member has been removed";
				$_SESSION['msg_type'] = "danger";
				header("location:../pcr-addteam.php");
			}
			else{
				echo "Error:" .$delete ."<br>" .mysqli_error($conn);
			}
		}
?>



<?php
//SESSION START
session_start();
//REQUIRE DB
require "db.php";

//IF DELETE IS CLIKED
if(isset($_GET['delete'])){
			$id = $_GET['delete']; 
			$delete = "DELETE FROM unit_name WHERE id = $id";
			
			//SESSION MESSAGE
			if(mysqli_query($conn,$delete)){
				$update = "UPDATE rescuers SET team_unit = '' WHERE rescuers.team_unit = '$id' ";
				if(mysqli_query($conn,$update)){
					$_SESSION['message'] = "Team has been removed";
					$_SESSION['msg_type'] = "danger";
					header("location:../pcr-addteam.php");
				}
				
			}
			else{
				echo "Error:" .$delete ."<br>" .mysqli_error($conn);
			}
		}
?>


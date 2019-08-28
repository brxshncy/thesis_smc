<?php
//SESSION START
session_start();
//REQUIRE DB
require "db.php";

//IF DELETE IS CLIKED
if(isset($_POST['del_id'])){
			$id = $_POST['del_id']; 
			$delete = "DELETE FROM pcr WHERE id = $id";
			
			//SESSION MESSAGE
			if(mysqli_query($conn,$delete)){
				$_SESSION['message'] = "Record has been deleted";
				$_SESSION['msg_type'] = "danger";
				header("location:../pcr-record.php");
			}
			else{
				echo "Error:" .$delete ."<br>" .mysqli_error($conn);
			}
		}
?>	
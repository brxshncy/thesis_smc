;<?php
session_start();
include 'db.php';
$msg ='';
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password' ";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1){
			$qry = mysqli_fetch_array($result);
			$_SESSION['username_admin'] = $qry['username'];
			$_SESSION['password_password'] = $qry['password'];
			$_SESSION['admin_type'] = $qry['admin_type'];

			if($_SESSION['admin_type']=="operation"){
				header("Location:../operation_index.php");

			}
			else if($_SESSION['admin_type']=="communication"){
				echo "communication";
			}
			else if($_SESSION['admin_type']=="training"){
				echo "training";
			}
			else if($_SESSION['admin_type']=="logistics"){

				header("location:../logistics_index.php");
			}
		}
			else{
					$_SESSION['message'] = "Invalid Username or Password!";
					$_SESSION['msg_type'] = "danger";
					header("location:../icdrrmo_login.php");
			}
		
	}
?>
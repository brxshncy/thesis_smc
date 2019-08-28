<?php
session_start();
include 'db.php';

$username = '';
$email = '';
$errors = array();


	if(isset($_POST['login'])){
		$firstname	= mysqli_escape_string($conn,$_POST['firstname']);
		$lastname= mysqli_escape_string($conn,$_POST['lastname']);
		$address= mysqli_escape_string($conn,$_POST['address']);
		$contact= mysqli_escape_string($conn,$_POST['contact']);
		$gender= mysqli_escape_string($conn,$_POST['gender']);
		$username= mysqli_escape_string($conn,$_POST['username']);
		$password= mysqli_escape_string($conn,$_POST['password']);
		$confirm_password= mysqli_escape_string($conn,$_POST['confirm_password']);

		//FORM VALIDATION

		if(empty($username)){
			array_push($errors, "Password is required!");
		}
		if(empty($password)){
			array_push($errors, "Password is required!");
		}
		if($password != $confirm_password){
			array_push($errors, "The two passwords do not match!");
		}

		//CHECK IF USERNAME DOES NOT EXIST

		$user_check = "SELECT * FROM rescuers WHERE username = '$username' LIMIT 1";
		$result_check = $conn->query($user_check) or die("Error:" .mysqli_error());
		$user = $result_check->fetch_assoc();


			if($user){
				if($user['username'] === $username){
				array_push($errors,"Username already exist!");
			}
		}
		if(count($errors) == 0){
				$password = md5($password);

				$query = "INSERT INTO rescuers (firstname,lastname,address,gender,contact,username,password) 
				VALUES ('$firstname','$lastname','$address','$gender','$contact','$username','$password')";

				$conn->query($query);
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in!";

				header("Location:../rescuer.php");
		}	
	}

?>
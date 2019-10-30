<?php
session_start();
include 'include/db.php';
global $conn;

$firstname = '';
$lastname = '';
$address = '';
$contact = '';
$username = '';
$errors = array();

	if(isset($_POST['register'])){

		$firstname = mysqli_escape_string($conn,$_POST['firstname']);
		$lastname = mysqli_escape_string($conn,$_POST['lastname']);
		$address = mysqli_escape_string($conn,$_POST['address']);
		$gender = mysqli_escape_string($conn,$_POST['gender']);
		$contact = mysqli_escape_string($conn,$_POST['contact']);
		$username = mysqli_escape_string($conn,$_POST['username']);
		$password = mysqli_escape_string($conn,$_POST['password']);
		$confirm_password = mysqli_escape_string($conn,$_POST['confirm_password']);
		$profile_pic = $_FILES['profile_picture']['name'];
		$target = 'images/' .$profile_pic;

		if(move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target)){
			echo "success";
		}
		
		



		//FORM VALIDATION

		if(empty($username)){
			array_push($errors,"Username required!");
		}
		if(empty($password)){
			array_push($errors,"Password fields are empty!");
		}
		if($password != $confirm_password){
			array_push($errors,"The two passwords dont match!");
		}

		$username_check = "SELECT * FROM rescuers WHERE username = '$username' LIMIT 1";
		$query = $conn->query($username_check);
		$user = mysqli_fetch_assoc($query);

		if($user){
			if($user['username'] == $username){
				array_push($errors, "Username already taken!");
			}
		}

		if(count($errors) == 0){
			$password1 = md5($password);
			$insert = "INSERT INTO rescuers (firstname,lastname,address,gender,contact,username,password,profile_picture) VALUES ('$firstname','$lastname','$address','$gender','$contact','$username','$password1','$profile_pic')";
			$query = $conn->query($insert);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now registered !";
			header("location:rescuer_registration.php");
			exit();
		}
	}

	if(isset($_POST['log-in'])){
		$username = mysqli_escape_string($conn, $_POST['username']);
		$password = mysqli_escape_string($conn, $_POST['password']);

		if(empty($username)){
			array_push($errors, "Fill in Username!");
		}
		if(empty($password)){
			array_push($errors,"Fill in Password!");
		}
		if(count($errors) == 0){
				$password = md5($password);
				$login = "SELECT * FROM rescuers WHERE username = '$username' AND password = '$password' ";
				$login_query = $conn->query($login);
				$data = mysqli_fetch_assoc($login_query);
		if(mysqli_num_rows($login_query) == 1 ){
					$_SESSION['confirm_username'] = $username;
					$_SESSION['firstname'] = $data['firstname'];
					$_SESSION['lastname'] = $data['lastname'];
					$_SESSION['success'] = "You are now logged in!";
					$_SESSION['fullname'] = $data['lastname'];

					$_SESSION['user_profile'] = $data['profile_picture'];
					header("location:rescuer_index.php");
			}
		else{
			array_push($errors,"Invalid Username or Password combination!");
		}
	}
}







?>
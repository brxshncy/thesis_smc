<?php 
require ('db.php');

if(isset($_POST)){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mi = $_POST['mi'];

	$insert = "INSERT INTO pcr_submit(firstname,lastname,mi) VALUES ('$firstname','$lastname','$mi')";
	$run = $conn->query($insert) OR trigger_error(mysqli_error($conn)." ".$insert);

	if($run){
		echo "success";
	}
}

?>
<?php
include 'include/db.php';
	
	if(isset($_POST['select'])){
		$name = $_POST['select'];
		$res = $conn->query("SELECT * FROM rescuers WHERE firstname = '$name' ");
		$row = mysqli_fetch_assoc($res);

		return $row['contact'];
	}
	

?>
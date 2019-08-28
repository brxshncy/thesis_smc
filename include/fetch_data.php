<?php

include('db.php');

if(isset($_POST['id'])){
	$query = "SELECT * FROM pcr WHERE id ='".$_POST["id"]."'";
	$result = mysqli_query($conn,$query);
	pre_r($result);



	$row = mysqli_fetch_array($result);
	echo "<pre>";
		print_r($row);
	echo "</pre>";
	echo json_encode($row);
}
?>
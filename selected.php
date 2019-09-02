<?php
include('include/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	
	$query = "SELECT * FROM rescuers WHERE id = '$id' ";
	$result = $conn->query($query);
	while($row = mysqli_fetch_array($result))
	{
		$data["address"] = $row['address'];
		$data["gender"] = $row['gender'];
		$data["contact"] = $row['contact'];
		$data["username"] = $row['username'];

	}
		echo json_encode($data);
}

?>
<?php
include('include/db.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$info = "SELECT * FROM rescuers WHERE id = '$id' ";
	$result = $conn->query($info);
	while($row = mysqli_fetch_array($result)){
		$data['firstname'] = $row['firstname'];
		$data['lastname'] = $row['lastname'];
		$data['address'] = $row['address'];
		$data['contact'] = $row['contact'];
		$data['gender'] = $row['gender'];
		$data['username'] = $row['username'];
	}
	echo json_encode($data);
}

?>
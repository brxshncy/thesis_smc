<?php
include "include/db.php";

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$select_team = "SELECT * FROM unit_name WHERE id = '$id' ";
	$result = $conn->query($select_team);
	while($row = mysqli_fetch_assoc($result)){
		$data['unit_name'] = $row['unit_name'];
		$data['transport_officer'] = $row['transport_officer'];
		$data['treatment_officer'] = $row['treatment_officer'];
	}
	echo json_encode($data);
}

?>
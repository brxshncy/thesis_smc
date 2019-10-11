<?php
session_start();
require ('db.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$select = "SELECT * FROM opr_item_request WHERE id = '$id' ";
	$result = $conn->query($select);
	while($row = mysqli_fetch_assoc($result)){
			$item_id = $row['item_id'];
			$date = $row['date'];
			$time = $row['time'];
			$item_name = $row['item_name'];
			$item_description = $row['item_description'];
			$quantity = $row['quantity'];
			$unit_measure = $row['unit_measure'];
			$enter_quantity = $row['enter_quantity'];
			$purpose = $row['purpose'];
			$sender = $row['sender'];
			$status = $row['status'];	

	}

}

?>
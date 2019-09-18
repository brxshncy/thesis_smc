<?php

include 'db.php';
session_start();

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$item_code = $_POST['item_code'];
		$item_name = $_POST['item_name'];
		$item_description = $_POST['item_description'];
		$quantity = $_POST['quantity'];
		$unit_measure = $_POST['unit_measure'];

		$update = "UPDATE items SET item_code= '$item_code',
		item_name= '$item_name ',
		item_description= '$item_description ',
		quantity= '$quantity ',
		unit_measure= '$unit_measure ' WHERE id = '$id';

		";
		$result = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

		if($result){
				$_SESSION['update'] = "Updated successfully!";
				header("location:../logistics_in_items.php");
				echo "success";
		}
	}

?>
<?php 
require ('db.php');

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$display_items = "SELECT * FROM items WHERE id = '$id'";
		$result = $conn->query($display_items);
		while($row = mysqli_fetch_assoc($result)){
			$data['item_name'] = $row['item_name'];
			$data['item_description'] = $row['item_description'];
			$data['quantity'] = $row['quantity'];
			$data['unit_measure'] = $row['unit_measure'];
		}
		echo json_encode($data);
	}
?>
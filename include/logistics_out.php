<?php

include 'db.php';
session_start();

	if(isset($_POST['submit'])){
		$need_items = $_POST['need_items'];

		$qry = "SELECT quantity FROM items WHERE id = 1";

		$result = $conn->query($qry) or trigger_error(mysqli_error($con)." ".$qry);

		while($row = mysqli_fetch_assoc($result)){
			$quantity = $row['quantity'];
		}
		$remains = $quantity - $need_items ;

		if($remains){
			$update = "UPDATE items SET quantity = '$remains'  WHERE id = 1 ";
			$result1 = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

			echo $remains;	
		}
	}
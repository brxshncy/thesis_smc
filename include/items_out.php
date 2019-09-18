<?php
include 'db.php';
session_start();

	if(isset($_POST['submit'])){
		$admin_type = $_POST['admin_type'];
		$item_name_id = $_POST['item_name_id'];
		$item_name = $_POST['item_name'];
		$date = date('Y-m-d',strtotime($_POST['date']));
		$time = $_POST['time_now'];
		$item_code = $_POST['item_code'];
		$item_description  = $_POST['item_description'];
		$quantity = $_POST['quantity'];
		$quantity_out = $_POST['quantity_out'];
		$purpose = $_POST['purpose'];


		$insert = "INSERT INTO items_out (reciever,item_id,item_name,date,time,item_code,item_description,quantity,quantity_out,purpose) VALUES
		 ('$admin_type','$item_name_id','$item_name','$date','$time','$item_code','$item_description','$quantity','$quantity_out','$purpose')";

		 $remain = $quantity - $quantity_out;


		 $result = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);

		 if($result){

		 	$update = "UPDATE items SET quantity = '$remain' WHERE id = '$item_name_id' ";
		 	$qry1 = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

		 	echo "success update";

		 	
		 }


		


	}
?>
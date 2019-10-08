<?php
require ('db.php');
session_start();

	if(isset($_POST['submit'])){
		$date = $_POST['date'];
		$time = $_POST['time'];
		$item_id = $_POST['item'];
		$item_name = $_POST['item_name'];
		$item_description = $_POST['item_description'];
		$quantity = $_POST['quantity'];
		$unit_measure = $_POST['unit_measure'];
		$enter_quantity = $_POST['enter_quantity'];
		$purpose = $_POST['purpose'];
		$status =  $_POST['status'];

		$date_converter = date("Y-m-d",strtotime($date ));
		$time_converter = date("h:i:s", strtotime($time ));

		

		$insert_request = "INSERT INTO opr_item_request (item_id,date,time,item_name,item_description,quantity,unit_measure,enter_quantity,purpose,status) 
						VALUES ('$item_id','$date_converter ','$time_converter ','$item_name ','$item_description ','$quantity ','$unit_measure ','$enter_quantity ','$purpose','$status')";
		$result = $conn->query($insert_request) OR trigger_error(mysqli_error($conn)." ".$insert_request);

		if($result){
			$_SESSION['succes_request'] = "Item Request successfully sent!";
			header("location:../opr_inventory.php");
		}
	}
?>
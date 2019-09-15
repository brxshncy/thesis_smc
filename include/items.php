<?php
include 'db.php';
session_start();

	if(isset($_POST['submit'])){
			$item_code=$_POST['item_code'];
			$item_name=$_POST['item_name'];
			$item_description=$_POST['item_description'];
			$quantity=$_POST['quantity'];
			$unit_measure=$_POST['unit_measure'];

			$stmt = $conn->prepare("INSERT INTO items (item_code,item_name,item_description,quantity,unit_measure) VALUES (?,?,?,?,?)") or die(mysqli_error()."error query");
			$stmt->bind_param("sssss",$item_code,$item_name,$item_description,$quantity,$unit_measure);
			$stmt->execute();

			if($stmt){
				$_SESSION['msg'] = "Item Added on the list";
				header("location:../logistics_in_items.php");
			}
	}


?>
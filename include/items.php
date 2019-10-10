<?php
include 'db.php';
session_start();

	if(isset($_POST['submit'])){
			$item_name=$_POST['item_name'];
			$item_description=$_POST['item_description'];
			$quantity=$_POST['quantity'];
			$unit_measure=$_POST['unit_measure'];


			var_dump($item_name);
			var_dump($item_description);
			var_dump($quantity);
			var_dump($unit_measure);

			$insert_item = "INSERT INTO items (item_name,item_description,quantity,unit_measure) VALUES ('$item_name','$item_description','$quantity','$unit_measure')";
			$result = $conn->query($insert_item) or trigger_error(mysqli_error($conn)." ".$insert_item);
			if($insert_item == true){
				$_SESSION['msg'] = "Item Added on the list";
			header("location:../logistics_in_items.php");
			}else{
				echo "error";
			}
	}


?>
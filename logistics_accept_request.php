<?php
session_start();
require ('include/db.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$notif = "1";
	$select = "SELECT * FROM opr_item_request WHERE id = '$id' ";
	$result = $conn->query($select);
	$field_count = mysqli_num_rows($result);
	if($field_count > 0){
		while($row = mysqli_fetch_assoc($result)) {
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
			date_default_timezone_set('Asia/Manila');
			$date_accept  = date('Y-m-d');
			$time_accept = date('h:i:s');
			
			$check = "SELECT quantity FROM items";
			$result_check = $conn->query($check);
			$new_quantity = mysqli_fetch_assoc($result_check);

			if($new_quantity < $enter_quantity){
				$_SESSION['not_enough'] = "insufficient items";
				header("location:logistics_requestitem.php");
				exit();
			}

			$query = "INSERT INTO 
			item_accept_request(`item_id`, `date`, `time`, `item_name`, `item_description`, `quantity`, `unit_measure`, `enter_quantity`, `purpose`, `sender`, `status`,date_accepted,time_accepted,notif) 
			VALUES ('$item_id','$date','$time','$item_name','$item_description','$quantity','$unit_measure','$enter_quantity','$purpose','$sender','$status','$date_accept','$time_accept',$notif)";
			$remain = $quantity - $enter_quantity;

			$result_insert = $conn->query($query) or trigger_error(mysqli_error($conn)." ".$query);
		}
		if($result_insert){
			$del = "DELETE FROM opr_item_request WHERE id = '$id'";
			$result_delete = $conn->query($del) or trigger_error(mysqli_error($conn)." ".$del);
			if($result_delete){
				$update_items = "UPDATE items SET quantity = '$remain' WHERE id ='$item_id'";
				$result_update = $conn->query($update_items) or trigger_error(mysqli_error($conn)." ".$update_items);
				if($result_update){
					$del_row = "DELETE FROM items WHERE quantity = 0";
					$result_del = $conn->query($del_row) or trigger_error(mysqli_error($conn)." ".$del_row);
					if($result_del){
						$_SESSION['item_accept'] = "Request has been accepted";
					header("location:logistics_requestitem.php");
					}
					
				}
				
			}
		}

	}
	else{
		echo "Unknown Error";
	}
}

?>
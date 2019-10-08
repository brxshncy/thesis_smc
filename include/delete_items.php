<?php 
include('db.php');

if(isset($_POST['del_id'])){
	$id = $_POST['del_id'];
	$delete_item = "DELETE FROM items WHERE id = '$id' ";
	$result = $conn->query($delete_item) OR trigger(mysqli_error($conn)." ".$delete_item);

	if($result == true){
		$_SESSION['del_items'] = "Item Deleted";
		header("location:../logistics_in_items.php");
	}
}

?>
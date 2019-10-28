<?php
require ('db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$qry = "UPDATE item_accept_request SET notif = $id";
	$result = $conn->query($qry) or trigger_error(mysqli_error($conn)." ".$qry);
}

?>
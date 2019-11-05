<?php

session_start();
require('db.php');
if(isset($_POST['del'])){
	$id = $_POST['del'];
	var_dump($id);

	$del = "DELETE FROM call_logs WHERE id ='$id'";
	$result = $conn->query($del) or trigger_error(mysqli_error($conn)." ".$del);
}
?>
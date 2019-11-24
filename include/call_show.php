<?php 
require('db.php');
$output='';
if(isset($_POST['response'])){
	$id = $_POST['response'];

	$logs = "SELECT * FROM emergency_call WHERE id = '$id'";
	$res = $conn->query($logs) or trigger_error(mysqli_error($conn)." ".$logs);
	while($row = mysqli_fetch_assoc($res)){
		
	}
}

?>
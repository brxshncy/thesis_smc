<?php
require('db.php');

if(isset($_POST)){
	$incident = $_POST['incident'];
	$pcr = $_POST['pcr'];

	$incident_tally = "INSERT INTO incident_tally (pcr_id,incident_category) VALUES ('$pcr','$incident')";
	$run = $conn->query($incident_tally) or trigger_error(mysqli_error($conn)." ".$incident_tally);
}

?>
<?php
include 'db.php';
session_start();

$qry = "SELECT * FROM accident";
$result = mysqli_query($conn,$qry) or trigger_error(mysqli_error($conn)." ".$qry);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	   $new = unserialize($row["new"]);

	   $vehicle_involve = [];
	   $patient = [];
	   if($new){
	   		$vehicle_involve = $new['vehicle_involve'];
	   		$patient = $new['patient'];

	   		echo 'Vehicle <br/>';
	   		echo implode(', ', $vehicle_involve);
	   		echo '<br/>';
	   		echo 'Patient <br/>';
	   		echo implode(', ', $patient);
	   }
	}
}
?>
<?php

include 'db.php';
session_start();

	if(isset($_POST['submit'])){
		$kind_accident  = $_POST['kind_accident'];
		$vehicle_involve = $_POST['vehicle'];
		$location_incident = $_POST['location_incident'];
		$date_incident = $_POST['date_incident'];
		$time_incident	 = $_POST['time_incident'];
		$unit_enroute = $_POST['unit_enroute'];
		$arrive_scene = $_POST['arrive_scene'];
		$patient  = $_POST['patient'];

		$new = [
		 	'vehicle_involve' => $vehicle_involve,
		 	'patient' => $patient,
		];

		$new = serialize($new);

		$qry = "INSERT INTO accident 
				(kind_accident, location_incident, date_incident, time_incident, unit_enroute, arrive_scene, new) VALUES
				('$kind_accident','$location_incident','$date_incident','$time_incident','$unit_enroute','$arrive_scene', '$new')";
		
		$result = mysqli_query($conn,$qry) or trigger_error(mysqli_error($conn)." ".$qry);

		if($result){
			echo "insert succesfully";
			header("location:../operation_logbook.php");
		}
}

?>
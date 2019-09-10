<?php

include 'db.php';
session_start();

	if(isset($_POST['submit'])){

		$vehicle = $_POST['vehicle'];

		foreach($vehicle as $vehicle){
			echo $vehicle ."". "<br>";
		}
		/*$team_unit = $_POST['team_unit'];
		$kind_accident  = $_POST['kind_accident'];
		$vehicle = $_POST['vehicle'];
		$vehicle_involve = count($vehicle);

		if($vehicle_involve > 1 ){
			for($i = 0; $i < $vehicle_involve; $i++){
				if(trim($vehicle[$i]) !=''){
					echo $vehicle[$i] ." ". "<br>";
				}
			}

		}
	}*/
}

?>
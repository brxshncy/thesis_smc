<?php
session_start();
include 'db.php';
global $conn;


	if(isset($_POST['update'])){
	$edit_id = $_POST['update_id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['mi'];
	$religion = $_POST['religion'];
		$nationality = $_POST['nationality'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$date_i = $_POST['date_i'];
		$time_i = $_POST['time_i'];
		$impression = $_POST['impression'];
		$r_p1 = $_POST['r_p1'];
		$contact1 = $_POST['contact1'];
		$r_p2 = $_POST['r_p2'];
		$contact2 = $_POST['contact2'];
		$reason = $_POST['reason'];
		$nature = $_POST['nature'];
		$neuro = $_POST['neuro'];
		$call_recieve = $_POST['call_recieve'];
		$arrive_scene = $_POST['arrive_scene'];
		$left_scene = $_POST['left_scene'];
		$arrive_destination = $_POST['arrive_destination'];
		$back_service = $_POST['back_service'];
		$airway = $_POST['airway'];
		$breathing = $_POST['breathing'];
		$pupils = $_POST['pupils'];
		$pulse = $_POST['pulse'];
		$skin = $_POST['skin'];
		$skin_texture = $_POST['skin_texture'];
		$crt = $_POST['crt'];
		$time_vs= $_POST['time_vs'];
		$bp = $_POST['bp'];
		$pr = $_POST['pr'];
		$rr = $_POST['rr'];
		$temp = $_POST['temp'];
		$stat = $_POST['stat'];
		$eye = $_POST['eye'];
		$verbal = $_POST['verbal'];
		$motor = $_POST['motor'];
		$total = $_POST['total'];
		$symtomps = $_POST['symtomps'];
		$allergies = $_POST['allergies'];
		$meds = $_POST['meds'];
		$past_ill= $_POST['past_ill'];
		$oral_intake= $_POST['oral_intake'];
		$time_oral= $_POST['time_oral'];
		$onset= $_POST['onset'];
		$provocation= $_POST['provocation'];
		$quality= $_POST['quality'];
		$radiation= $_POST['radiation'];           
		$severity= $_POST['severity'];
		$timing_i= $_POST['timing_i'];
		$events_prior= $_POST['events_prior'];
		$trauma = $_POST['trauma'];
		$burn = $_POST['burn'];
		$treatment = $_POST['treatment'];
		$narrative = $_POST['narrative'];
		$transport_officer = $_POST['transport_officer'];
		$treatment_officer = $_POST['treatment_officer'];
		$dispatched_unit = $_POST['dispatched_unit'];
		$desti_deter = mysqli_escape_string($conn,$_POST['desti_deter']);
		$response_mode = mysqli_escape_string($conn,$_POST['response_mode']);
		$transport_mode = $_POST['transport_mode'];
		$receiving_facility = $_POST['receiving_facility'];
		$receiving_md = $_POST['receiving_md'];
	 
	$update = "UPDATE pcr_official SET 	firstname = '$firstname', lastname = '$lastname', 
								middlename = '$middlename', age = '$age',
								religion= '$religion', nationality = '$nationality',
								gender ='$gender', address = '$address', 
								date_i = '$date_i', time_i = '$time_i',
								impression ='$impression',
								r_p1 = '$r_p1', contact1 = '$contact1',
								r_p2 = '$r_p2', contact2 = '$contact2',
								reason = '$reason', nature='$nature', neuro = '$neuro',
								call_recieve = '$call_recieve', arrive_scene = '$arrive_scene',
								left_scene = '$left_scene', arrive_destination = '$arrive_destination',
								back_service = '$back_service', airway = '$airway',
								breathing = '$breathing', pupils = '$pupils', pulse = '$pulse', skin = '$skin',
								skin_texture = '$skin_texture', crt = '$crt', time_vs ='$time_vs',
								bp = '$bp', pr = '$pr', rr = '$rr', temp = '$temp', 02stat = '$stat',
								eye = '$eye', verbal = '$verbal', motor = '$motor', total = '$total',
								symtomps = '$symtomps', allergies = '$allergies', meds = '$meds',
								past_ill = '$past_ill', oral_intake = '$oral_intake', time_oral = '$time_oral',
								onset = '$onset', provocation = '$provocation', quality = '$quality', radiation ='$radiation',
								severity = '$severity', timing_i = '$timing_i', events_prior = '$events_prior', trauma = '$trauma',
								burn = '$burn', treatment = '$treatment', narrative = '$narrative', transport_officer = '$transport_officer',
								treatment_officer = '$treatment_officer', dispatched_unit = '$dispatched_unit', desti_deter = '$desti_deter',
								response_mode = '$response_mode', transport_mode = '$transport_mode', receiving_facility = '$receiving_facility',
								receiving_md = '$receiving_md'

								WHERE id = '$edit_id' ";



	$result = mysqli_query($conn,$update);

		if (!mysqli_query($conn,$update))
  		{
				  echo("Error description: " . mysqli_error($conn));
	  }
				else{
					echo '<script> alert(Updated Succesfully!); </script>';
					header("location:../pcr-record.php");
					$_SESSION['message'] = "Record has been Updated";
					$_SESSION['msg_type'] = "info";
				}
				}
			?>

<?php
session_start();
if(isset($_POST['upload'])){
require "db.php";

//PATIENT PERSONAL INFO
	$sender = $_POST['sender'];
	$team = $_POST['team'];
	$firstname = mysqli_escape_string($conn,$_POST['firstname']);
	$lastname =  mysqli_escape_string($conn,$_POST['lastname']);
	$mi =  mysqli_escape_string($conn,$_POST['mi']);
	$religion =  mysqli_escape_string($conn,$_POST['religion']);
	$nationality =  mysqli_escape_string($conn,$_POST['nationality']);
	$age =  mysqli_escape_string($conn,$_POST['age']);
	$home_address =  mysqli_escape_string($conn,$_POST['home_address']);
	$incident_address = mysqli_escape_string($conn,$_POST['incident_address']);
	$med_facility = mysqli_escape_string($conn,$_POST['med_facility']);
	$time_i = $_POST['time_i'];
	$complaints = mysqli_escape_string($conn,$_POST['complaints']);
	$date_i  = $_POST['date_i'];
	$gender =  mysqli_escape_string($conn,$_POST['gender']);
	$team_leader = $_POST['team_leader'];
	$transport_officer = $_POST['transport_officer'];
	$treatment_officer = $_POST['treatment_officer'];
	$barangay = mysqli_escape_string($conn,$_POST['barangay']);
	$desti_deter = mysqli_escape_string($conn,$_POST['desti_deter']);
	$response_mode = mysqli_escape_string($conn,$_POST['response_mode']);
	$transport_mode = mysqli_escape_string($conn,$_POST['transport_mode']);
	$impression = mysqli_escape_string($conn,$_POST['impression']);
	$r_p1 = mysqli_escape_string($conn,$_POST['r_p1']);
	$contact1 = mysqli_escape_string($conn,$_POST['contact1']);
	$nature = mysqli_escape_string($conn,$_POST['nature']);
	$neuro = mysqli_escape_string($conn,$_POST['neuro']);
	$call_recieve = mysqli_escape_string($conn,$_POST['call_recieve']);
	$unit_enroute = mysqli_escape_string($conn,$_POST['unit_enroute']);
	$arrive_scene = mysqli_escape_string($conn,$_POST['arrive_scene']);
	$left_scene = mysqli_escape_string($conn,$_POST['left_scene']);
	$arrive_destination = mysqli_escape_string($conn,$_POST['arrive_destination']);
	$back_service = mysqli_escape_string($conn,$_POST['back_service']);
	$airway = mysqli_escape_string($conn,$_POST['airway']);
	$breathing = mysqli_escape_string($conn,$_POST['breathing']);
	$pupils = mysqli_escape_string($conn,$_POST['pupils']);
	$pulse = mysqli_escape_string($conn,$_POST['pulse']);
	$skin = mysqli_escape_string($conn,$_POST['pupils']);
	$skin_texture = mysqli_escape_string($conn,$_POST['skin_texture']);
	$crt = mysqli_escape_string($conn,$_POST['crt']);
	$time_vs = mysqli_escape_string($conn,$_POST['time_vs']);
	$bp = mysqli_escape_string($conn,$_POST['bp']);
	$pr = mysqli_escape_string($conn,$_POST['pr']);
	$rr = mysqli_escape_string($conn,$_POST['rr']);
	$temp = mysqli_escape_string($conn,$_POST['temp']);
	$stat = mysqli_escape_string($conn,$_POST['stat']);
	$eye = mysqli_escape_string($conn,$_POST['eye']);
	$verbal = mysqli_escape_string($conn,$_POST['verbal']);
	$motor = mysqli_escape_string($conn,$_POST['motor']);
	$total = mysqli_escape_string($conn,$_POST['total']);
	$symtomps = mysqli_escape_string($conn,$_POST['symtomps']);
	$allergies = mysqli_escape_string($conn,$_POST['allergies']);
	$meds = mysqli_escape_string($conn,$_POST['meds']);
	$past_ill = mysqli_escape_string($conn,$_POST['past_ill']);
	$oral_intake = mysqli_escape_string($conn,$_POST['oral_intake']);
	$time_oral = mysqli_escape_string($conn,$_POST['time_oral']);
	$events_prior = mysqli_escape_string($conn,$_POST['events_prior']);
	$onset = mysqli_escape_string($conn,$_POST['onset']);
	$provocation = mysqli_escape_string($conn,$_POST['provocation']);
	$quality = mysqli_escape_string($conn,$_POST['quality']);
	$radiation = mysqli_escape_string($conn,$_POST['radiation']);
	$severity = mysqli_escape_string($conn,$_POST['severity']);
	$timing_i = mysqli_escape_string($conn,$_POST['timing_i']);
	$trauma = mysqli_escape_string($conn,$_POST['trauma']);
	$burn = mysqli_escape_string($conn,$_POST['burn']);
	$treatment = mysqli_escape_string($conn,$_POST['treatment']);
	$narrative = mysqli_escape_string($conn,$_POST['narrative']);

	if($barangay !== '' || !empty($barangay)){
		$barangay_tally = "INSERT INTO barangay_responses (barangay_name,date_incident) VALUES ('$barangay','$date_i')";
		$run_tally = $conn->query($barangay_tally) or trigger_error(mysqli_error($conn)." ".$barangay_tally);
	}




$insert_pcr = "
INSERT INTO pcr_submit
(sender,team,firstname,lastname,mi,religion,nationality,age,home_address,incident_address,med_facility,time_i,complaints,date_i,gender,team_leader,transport_officer,treatment_officer,barangay,desti_deter,response_mode,transport_mode,impression,r_p1,contact1,nature,neuro,call_recieve,unit_enroute,arrive_scene,left_scene,arrive_destination,back_service,airway,breathing,pupils,pulse,skin,skin_texture,crt,time_vs,bp,pr,rr,temp,stat,eye,verbal,motor,total,symtomps,allergies,meds,past_ill,oral_intake,time_oral,events_prior,onset,provocation,quality,radiation,severity,timing_i,trauma,burn,treatment,narrative)
VALUES
('$sender','$team','$firstname','$lastname','$mi','$religion','$nationality','$age','$home_address','$incident_address','$med_facility','$time_i','$complaints','$date_i','$gender','$team_leader',
'$transport_officer','$treatment_officer','$barangay','$desti_deter','$response_mode','$transport_mode','$impression','$r_p1','$contact1','$nature','$neuro','$call_recieve','$unit_enroute','$arrive_scene','$left_scene','$arrive_destination','$back_service','$airway','$breathing','$pupils','$pulse','$skin','$skin_texture','$crt','$time_vs','$bp','$pr','$rr','$temp','$stat','$eye','$verbal','$motor','$total','$symtomps','$allergies','$meds','$past_ill','$oral_intake','$time_oral','$events_prior','$onset','$provocation','$quality','$radiation','$severity','$timing_i','$trauma','$burn','$treatment','$narrative');
		";
		$run_pcr = $conn->query($insert_pcr) or trigger_error(mysqli_error($conn)." ".$insert_pcr);

		if($run_pcr){
			$_SESSION['message'] = "Submitted successfully!";
			header("location:../pcr-form.php");
		}
	
}

?>
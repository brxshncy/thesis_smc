<?php
include 'db.php';
session_start();

if(isset($_POST['upload'])){
	$edit_id = $_POST['update_id'];
	$firstname = mysqli_escape_string($conn,$_POST['firstname']);
		$lastname =  mysqli_escape_string($conn,$_POST['lastname']);
		$mi =  mysqli_escape_string($conn,$_POST['mi']);
		$religion =  mysqli_escape_string($conn,$_POST['religion']);
		$nationality =  mysqli_escape_string($conn,$_POST['nationality']);
		$age =  mysqli_escape_string($conn,$_POST['age']);
		$gender =  mysqli_escape_string($conn,$_POST['gender']);
		$address =  mysqli_escape_string($conn,$_POST['address']);

		//INCIDENT INFO
		$date_i =  mysqli_escape_string($conn,$_POST['date_i']);
		$time_i =  mysqli_escape_string($conn,$_POST['time_i']);
		$impression = mysqli_escape_string($conn,$_POST['impression']);
		$r_p1 = mysqli_escape_string($conn,$_POST['r_p1']);
		$contact1 = mysqli_escape_string($conn,$_POST['contact1']);
		$r_p2 = mysqli_escape_string($conn,$_POST['r_p2']);
		$contact2 = mysqli_escape_string($conn,$_POST['contact2']);
		$reason = mysqli_escape_string($conn,$_POST['reason']);
		$nature = mysqli_escape_string($conn,$_POST['nature']);
		$neuro =mysqli_escape_string($conn,$_POST['neuro']);
		$call_recieve = mysqli_escape_string($conn,$_POST['call_recieve']);
		$unit_enroute = mysqli_escape_string($conn,$_POST['unit_enroute']);
		$arrive_scene =mysqli_escape_string($conn,$_POST['arrive_scene']);
		$left_scene =mysqli_escape_string($conn,$_POST['left_scene']);
		$arrive_destination = mysqli_escape_string($conn,$_POST['arrive_destination']);
		$back_service = mysqli_escape_string($conn,$_POST['back_service']);
		$airway = mysqli_escape_string($conn,$_POST['airway']);
		$breathing = mysqli_escape_string($conn,$_POST['breathing']);
		$pupils = mysqli_escape_string($conn,$_POST['pupils']);
		$pulse =mysqli_escape_string($conn,$_POST['pulse']);
		$skin =mysqli_escape_string($conn,$_POST['skin']);
		$skin_texture = mysqli_escape_string($conn,$_POST['skin_texture']);
		$crt = mysqli_escape_string($conn,$_POST['crt']);

		//VITAL SIGNS
		$time_vs= mysqli_escape_string($conn,$_POST['time_vs']);
		$bp = mysqli_escape_string($conn,$_POST['bp']);
		$pr = mysqli_escape_string($conn,$_POST['pr']);
		$rr = mysqli_escape_string($conn,$_POST['rr']);
		$temp = mysqli_escape_string($conn,$_POST['temp']);
		$stat = mysqli_escape_string($conn,$_POST['stat']);
		$eye =mysqli_escape_string($conn,$_POST['eye']);
		$verbal = mysqli_escape_string($conn,$_POST['verbal']);
		$motor =mysqli_escape_string($conn,$_POST['motor']);
		$total =mysqli_escape_string($conn,$_POST['total']);

		//ASSESMENT
		$symtomps = mysqli_escape_string($conn,$_POST['symtomps']);
		$allergies =mysqli_escape_string($conn,$_POST['allergies']);
		$meds = mysqli_escape_string($conn,$_POST['meds']);
		$past_ill= mysqli_escape_string($conn,$_POST['past_ill']);
		$oral_intake= mysqli_escape_string($conn,$_POST['oral_intake']);
		$time_oral= mysqli_escape_string($conn,$_POST['time_oral']);
		$onset= mysqli_escape_string($conn,$_POST['onset']);
		$provocation= mysqli_escape_string($conn,$_POST['provocation']);
		$quality=mysqli_escape_string($conn,$_POST['quality']);
		$radiation=  mysqli_escape_string($conn,$_POST['radiation']);           
		$severity= mysqli_escape_string($conn,$_POST['severity']);
		$timing_i= mysqli_escape_string($conn,$_POST['timing_i']);
		$events_prior= mysqli_escape_string($conn,$_POST['events_prior']);
		$trauma = mysqli_escape_string($conn,$_POST['trauma']);
		$burn = mysqli_escape_string($conn,$_POST['burn']);
		$treatment = mysqli_escape_string($conn,$_POST['treatment']);
		$narrative = mysqli_escape_string($conn,$_POST['narrative']);

		//RESCUER INFO
		$transport_officer = mysqli_escape_string($conn,$_POST['transport_officer']);
		$treatment_officer =mysqli_escape_string($conn,$_POST['treatment_officer']);
		$dispatched_unit = mysqli_escape_string($conn,$_POST['dispatched_unit']);
		$desti_deter = mysqli_escape_string($conn,$_POST['desti_deter']);
		$response_mode = mysqli_escape_string($conn,$_POST['response_mode']);
		$transport_mode = mysqli_escape_string($conn,$_POST['transport_mode']);
		$receiving_facility = mysqli_escape_string($conn,$_POST['receiving_facility']);
		$receiving_md = mysqli_escape_string($conn,$_POST['receiving_md']);
		$status = $_POST['status'];
		$team = $_POST['team'];
		$sender = $_POST['sender'];
	 
	$update = "UPDATE pcr SET 	firstname = '$firstname', lastname = '$lastname', 
								middlename = '$mi', age = '$age',
								religion= '$religion', nationality = '$nationality',
								gender ='$gender', address = '$address', 
								date_i = '$date_i', time_i = '$time_i',
								impression ='$impression',
								r_p1 = '$r_p1', contact1 = '$contact1',
								r_p2 = '$r_p2', contact2 = '$contact2',
								reason = '$reason', neuro = '$neuro',
								call_recieve = '$call_recieve', arrive_scene = '$arrive_scene',
								left_scene = '$left_scene', arrive_destination = '$arrive_destination',
								back_service = '$back_service', airway = '$airway',
								breathing = '$breathing', pupils = '$pupils',pulse = '$pulse', skin = '$skin',
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
								receiving_md = '$receiving_md', status = '$status', sender = '$sender', team = '$team'

								WHERE id = '$edit_id' ";
	$result = $conn->query($update) OR trigger_error(mysqli_error($update)." ".$update);

	if($result){
		// SQL INSERT
		$insert = "INSERT INTO
		 pcr_official (firstname,lastname,middlename,religion,nationality,age,gender,address,date_i,time_i,impression,r_p1,contact1,r_p2,contact2,reason,nature,neuro,call_recieve,unit_enroute,arrive_scene,left_scene,arrive_destination,back_service,airway,breathing,pupils,pulse,skin,skin_texture,crt,time_vs,bp,pr,rr,temp,02stat,eye,verbal,motor,total,symtomps,allergies,meds,past_ill,oral_intake,time_oral,onset,provocation,quality,radiation,severity,timing_i,events_prior,trauma,burn,treatment,narrative,transport_officer,treatment_officer,dispatched_unit,desti_deter,response_mode,transport_mode,receiving_facility,receiving_md,status,rescuer_id,team_id) 
		VALUES('$firstname','$lastname','$mi','$religion','$nationality','$age','$gender','$address','$date_i','$time_i','$impression','$r_p1','$contact1','$r_p2','$contact2','$reason','$nature','$neuro','$call_recieve ','$unit_enroute','$arrive_scene','$left_scene','$arrive_destination','$back_service','$airway','$breathing','$pupils','$pulse','$skin','$skin_texture','$crt','$time_vs','$bp','$pr','$rr','$temp','$stat','$eye','$verbal','$motor','$total','$symtomps','$allergies','$meds','$past_ill','$oral_intake','$time_oral','$onset','$provocation','$quality','$radiation','$severity','$timing_i','$events_prior','$trauma','$burn','$treatment','$narrative','$transport_officer','$treatment_officer','$dispatched_unit','$desti_deter','$response_mode','$transport_mode','$receiving_facility','$receiving_md','$status','$sender','$team')";
		$result2 = $conn->query($insert);
		
		$del = "DELETE FROM pcr WHERE pcr.id = '$edit_id' ";
		$result3 = $conn->query($del);
		if($result2 || $result3){
			$_SESSION['message'] = "Record updated successfully and submitted to database"; 
		header("location:../pcr-list.php");	
		}
		
	}

}
?>
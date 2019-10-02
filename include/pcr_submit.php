		<?php

session_start();
	// if upload button is clicked
	if(isset($_POST['upload'])){

		// require database
			require "db.php";

		// declaring variable
			//PATIENT PERSONAL INFO
		$id = $_POST['id'];
		$firstname = mysqli_escape_string($conn,$_POST['firstname']);
		$lastname =  mysqli_escape_string($conn,$_POST['lastname']);
		$mi =  mysqli_escape_string($conn,$_POST['middlename']);
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


		// SQL INSERT
		$insert = "INSERT INTO
		 pcr_official (firstname,lastname,middlename,religion,nationality,age,gender,address,date_i,time_i,impression,r_p1,contact1,r_p2,contact2,reason,nature,neuro,call_recieve,unit_enroute,arrive_scene,left_scene,arrive_destination,back_service,airway,breathing,pupils,pulse,skin,skin_texture,crt,time_vs,bp,pr,rr,temp,02stat,eye,verbal,motor,total,symtomps,allergies,meds,past_ill,oral_intake,time_oral,onset,provocation,quality,radiation,severity,timing_i,events_prior,trauma,burn,treatment,narrative,transport_officer,treatment_officer,dispatched_unit,desti_deter,response_mode,transport_mode,receiving_facility,receiving_md,status) 
		VALUES('$firstname','$lastname','$mi','$religion','$nationality','$age','$gender','$address','$date_i','$time_i','$impression','$r_p1','$contact1','$r_p2','$contact2','$reason','$nature','$neuro','$call_recieve ','$unit_enroute','$arrive_scene','$left_scene','$arrive_destination','$back_service','$airway','$breathing','$pupils','$pulse','$skin','$skin_texture','$crt','$time_vs','$bp','$pr','$rr','$temp','$stat','$eye','$verbal','$motor','$total','$symtomps','$allergies','$meds','$past_ill','$oral_intake','$time_oral','$onset','$provocation','$quality','$radiation','$severity','$timing_i','$events_prior','$trauma','$burn','$treatment','$narrative','$transport_officer','$treatment_officer','$dispatched_unit','$desti_deter','$response_mode','$transport_mode','$receiving_facility','$receiving_md','$status')";


		$result = mysqli_query($conn,$insert) or trigger_error(mysqli_error($conn)." ".$insert);

		if($result){
				$_SESSION['success_msg'] = "PCR submitted to database successfully!";
			$del = "DELETE FROM pcr WHERE id = '$id'";
			$result_del = $conn->query($del);
			if($result_del){
				header("location:../pcr-list.php");
			}
		}
}
?>
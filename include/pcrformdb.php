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
	$date_i  = $_POST['date_i'];
	$gender =  mysqli_escape_string($conn,$_POST['gender']);
	$team_leader = $_POST['team_leader'];
	$transport_officer = $_POST['transport_officer'];
	$treatment_officer = $_POST['treatment_officer'];
	$barangay = mysqli_escape_string($conn,$_POST['barangay']);

	$barangay_tally = "INSERT INTO barangay_responses (barangay_name,date_incident) VALUES ('$barangay','$date_i')";
	$run_tally = $conn->query($barangay_tally) or trigger_error(mysqli_error($conn)." ".$barangay_tally);

	if($run_tally){
		$insert_pcr = "
		INSERT INTO pcr_submit
		(sender,team,firstname,lastname,mi,religion,nationality,age,home_address,incident_address,med_facility,date_i,gender,team_leader,transport_officer,treatment_officer,barangay)
		VALUES
		('$sender','$team','$firstname','$lastname','$mi','$religion','$nationality','$age','$home_address','$incident_address','$med_facility','$date_i','$gender','$team_leader','$transport_officer','$treatment_officer','$barangay');
		";
		$run_pcr = $conn->query($insert_pcr) or trigger_error(mysqli_error($conn)." ".$insert_pcr);

		if($run_pcr){
			$_SESSION['message'] = "Submitted successfully!";
			header("location:../pcr-form.php");
		}
	}
}


?>
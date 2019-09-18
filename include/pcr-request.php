<?php
include 'db.php';
session_start();

	if(isset($_POST['id'])){
		$id = $_POST['id'];


		$qry = "SELECT * FROM pcr WHERE id = '$id'";
		$result = $conn->query($qry) or trigger_error(mysqli_error($conn)." ".$qry);
		while($row = mysqli_fetch_assoc($result)){
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$middlename = $row['middlename'];
			$religion = $row['religion'];
			$nationality = $row['nationality'];
			$age = $row['age'];
			$gender = $row['gender'];
			$address = $row['address'];
			$date_i = $row['date_i'];
			$time_i = $row['time_i'];
			$r_p1 = $row['r_p1'];
			$contact1 = $row['contact1'];
			$r_p2 = $row['r_p2'];
			$contact2 = $row['contact2'];
			$reason = $row['reason'];
			$nature = $row['nature'];
			$neuro = $row['neuro'];
			$call_recieve = $row['call_recieve'];
			$unit_enroute = $row['unit_enroute'];
			$arrive_scene = $row['arrive_scene'];
			$left_scene = $row['left_scene'];
			$arrive_destination = $row['arrive_destination'];
			$back_service = $row['back_service'];
			$airway = $row['airway'];
			$breathing = $row['breathing'];
			$pupils = $row['pupils'];
			$pulse = $row['pulse'];
			$skin = $row['skin'];
			$skin_texture = $row['skin_texture'];
			$crt = $row['crt'];
			$time_vs = $row['time_vs'];
			$bp = $row['bp'];
			$pr = $row['pr'];
			$rr = $row['rr'];
			$temp = $row['temp'];
			$stat = $row['02stat'];
			$eye = $row['eye'];
			$verbal = $row['verbal'];
			$motor = $row['motor'];
			$total = $row['total'];
			$symtomps = $row['symtomps'];
			$allergies = $row['allergies'];
			$meds = $row['meds'];
			$past_ill = $row['past_ill'];
			$oral_intake = $row['oral_intake'];
			$time_oral = $row['time_oral'];
			$onset = $row['onset'];
			$provocation = $row['provocation'];
			$quality = $row['quality'];
			$radiation = $row['radiation'];
			$severity = $row['severity'];
			$timing_i = $row['timing_i'];
			$events_prior = $row['events_prior'];
			$trauma = $row['trauma'];
			$burn = $row['burn'];
			$treatment = $row['treatment'];
			$narrative = $row['narrative'];
			$transport_officer = $row['transport_officer'];
			$treatment_officer = $row['treatment_officer'];
			$dispatched_unit = $row['dispatched_unit'];
			$desti_deter = $row['desti_deter'];
			$response_mode = $row['response_mode'];
			$transport_mode = $row['transport_mode'];
			$receiving_facility = $row['receiving_facility'];
			$receiving_md = $row['receiving_md'];
			$trauma = $row['trauma'];
			$burn = $row['burn'];
			$status = $row['status'];
		 }
	}

?>
<div class="jumbotron bg-light">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $firstname; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" value="<?php echo $lastname; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Middle Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $middlename; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Religion</label>
				<input type="text" class="form-control" value="<?php echo $religion; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Nationality</label>
				<input type="text" class="form-control text-danger" value="<?php echo $nationality; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Age</label>
				<input type="text" class="form-control" value="<?php echo $age ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Gender</label>
				<input type="text" class="form-control text-danger" value="<?php echo $gender ; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" value="<?php echo $address ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Date of Incident</label>
				<input type="text" class="form-control text-danger" value="<?php echo $date_i  ; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Time of Incident</label>
				<input type="text" class="form-control" value="<?php echo $time_i  ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Relation to Patient</label>
				<input type="text" class="form-control text-danger" value="<?php echo $r_p1 ; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Contact Number</label>
				<input type="text" class="form-control" value="<?php echo $contact1 ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Relation to Patient</label>
				<input type="text" class="form-control text-danger" value="<?php echo $r_p2 ; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Contact Number</label>
				<input type="text" class="form-control" value="<?php echo $contact2 ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Reason</label>
				<input type="text" class="form-control text-danger" value="<?php echo $reason ; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nature of Incident</label>
				<input type="text" class="form-control" value="<?php echo $nature  ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $neuro ; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $call_recieve  ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $unit_enroute; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $arrive_scene ; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $arrive_destination; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $back_service; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $airway; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $breathing; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $pupils ; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $pulse; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $skin; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $skin_texture; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $crt; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $time_vs; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $bp; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $pr; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $rr; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $temp; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $stat; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $eye; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $verbal; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $motor; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $total; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $symtomps; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $allergies; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $meds; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $past_ill; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $oral_intake; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $time_oral; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $onset; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $provocation; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $quality; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $radiation; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $severity; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $timing_i; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $events_prior; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $trauma; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $burn; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $treatment; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $narrative; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $transport_officer; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $treatment_officer; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $dispatched_unit; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $desti_deter; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $response_mode; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $transport_mode; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control text-danger" value="<?php echo $receiving_facility; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" value="<?php echo $receiving_md; ?>" readonly>
			</div>
		</div>
	</div>
</div>

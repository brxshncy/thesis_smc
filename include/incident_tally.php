<?php 
require('db.php');

if(isset($_POST['incident_id'])){
	$id = $_POST['incident_id'];

	$incident = "SELECT * FROM pcr_submit WHERE id ='$id'";
	$run = $conn->query($incident) or trigger_error(mysqli_error($conn)." ".$incident);
	while($row = mysqli_fetch_assoc($run)){ 
		$name = $row['firstname']." ".$row['mi']." ".$row['lastname'];
	?>


<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Incident Tally Category: </label>
			<select name="incident" id="incident" class="form-control">
				<option value="">Please Select</option>
				<option value="Hospital to Hospital">Hospital to Hospital</option>
				<option value="Residence to Hospital">Residence to Hospital</option>
				<option value="Hospital to Residence">Hospital to Residence</option>
				<option value="Incident Area to Hospital">Incident Area to Hospital</option>
				<option value="Out of town travel">Out of town travel</option>
				<option value="Flashflood">Flashflood</option>
				<option value="Fire/Conflagaration Incident">Fire/Conflagaration Incident</option>
				<option value="Suicide Incident">Suicide Incident</option>
				<option value="Bombing Incident">Bombing Incident</option>
				<option value="Motor Vehicular Incident">Motor Vehicular Incident</option>
				<option value="Land Slide">Land Slide</option>
				<option value="Drowning Incident">Drowning Incident</option>
				<option value="Refuse to Transport">Refuse to Transport</option>
				<option value="Stabbing Incident">Stabbing Incident</option>
				<option value="Gunshot Incident">Gunshot Incident</option>
				<option value="Monitoring Activty (Sports,Celebration,ETC)">Monitoring Activty (Sports,Celebration,ETC)</option>
				<option value="Search and Rescue Retrieval">Search and Rescue Retrieval</option>
			</select>
			<span id="error_message" class="text-danger">
		</div>
	</div>
</div>
<hr>
<h4>Patient Info</h4>
<div class="row mt-3">
	<div class="col">
		<div class="form-group">
			<input type="hidden" value="<?php echo $row['id'] ?>" readonly id="pcr">
			<label>Patient Name</label>
			<input type="text" value="<?php echo $name ?>" id="name" class="form-control" readonly>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Date of Incident</label>
			<input type="text" value="<?php echo $row['date_i'] ?>" class="form-control" readonly>
		</div>
	</div>
</div>

<?php	}
}


?>

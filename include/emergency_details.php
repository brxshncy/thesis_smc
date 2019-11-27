<?php 
require ('db.php');

if(isset($_POST['call_id'])){
	$id = $_POST['call_id'];

	$emergency = "SELECT * FROM emergency_call WHERE id ='$id'";
	$run = $conn->query($emergency) or trigger_error(mysqli_error($conn)." ".$emergency);
	while($row = mysqli_fetch_assoc($run)){ 
		$patient = $row['p_fname']." ".$row['p_lname'];
		$caller = $row['c_fname']." ".$row['c_lname'];
		$reason = $row['reason_call'];
		$num_call = $row['number_caller'];
		$date_call = $row['date_call'];
		$call_time = $row['call_time'];
		$address = $row['address_incident'];
		$hospital = $row['hospital'];
	?>
<div class="row">
	<div class="col col-md-6">
		<div class="form-row">
			<label>Patient Name</label>
			<input type="text" value="<?php echo $patient ?>" class="form-control ml-1" readonly>
		</div>
	</div>
	<div class="col col-md-6">
		<div class="form-row">
			<label>Caller Name:</label>
			<input type="text" value="<?php echo $caller ?>" class="form-control ml-1"  readonly>
		</div>
	</div>
</div>
<div class="row">
	</div>

<?php }
}

?>
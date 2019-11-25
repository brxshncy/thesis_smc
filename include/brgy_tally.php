<?php

require ('db.php');

if(isset($_POST['brgy_id'])){
	$id = $_POST['brgy_id']; 


/*$brgy = "SELECT * FROM barangay";
$run_brgy = $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
while($row = mysqli_fetch_assoc($run_brgy)){?>
<?php
	$brgy_responses = "SELECT *, COUNT(brgy_res.barangay_name) as tally FROM barangay_responses brgy_res 
	LEFT JOIN pcr_submit pcr ON pcr.barangay = brgy_res.id WHERE pcr.barangay = '$id'";
	$run_response = $conn->query($brgy_responses) or trigger_error(mysqli_error($conn)." ".$run_response);
	$count = mysqli_fetch_assoc($run_response);
?>
<div class="row">
	<div class="form-group col col-md-3">
        <label for="brgy_responses"><?php echo $row['baranggay_name'] ?></label>
    </div>
    <div class="form-group col col-md-4">
        <input type="text" name="brgy_responses" id="brgy_responses" value="<?php echo $count['tally'] ?>" class="form-control" required>
    </div>
</div>
<?php }*/
	$brgy = "SELECT *, brgy.baranggay_name as brgy, COUNT(brgy_res.barangay_name) as responses FROM pcr_submit pcr 
	LEFT JOIN barangay brgy ON pcr.barangay = brgy.id LEFT JOIN barangay_responses brgy_res ON brgy_res.barangay_name = pcr.barangay WHERE pcr.id = '$id'";
	$run_brgy = $conn->query($brgy) OR trigger_error(mysqli_error($conn)." ".$run_brgy);
	$row = mysqli_fetch_assoc($run_brgy); ?>

	<div class="row">
		<div class="form-inline col">
			<label>Barangay Involve</label>
	        <input type="text" value="<?php echo $row['brgy'] ?>" class="form-control col ml-2	" readonly>
	    </div>
	</div>
	<div class="row mt-4">
	<div class="form-inline col">
	    	<label>Total Responses</label>
        	<input type="text" name="brgy_responses" id="brgy_responses" value="<?php echo $row['responses'] ?>" class="form-control col-md-2 ml-3"  required>
   		</div>
   	</div>

<?php }

?>
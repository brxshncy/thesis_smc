<?php
session_start();
include 'db.php';

	if(isset($_POST['edit_locator'])){
		$id = $_POST['edit_locator'];

		$fetch = "SELECT * FROM locator_slip WHERE id = '$id' ";
		$result = mysqli_query($conn,$fetch);
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$employee_name = $row['employee_name'];
			$destination = $row['destination'];
			$purpose = $row['purpose'];
			$date = $row['date'];
			$time = $row['time'];


		}
	}

?>
<form action="include/update_locator.php" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id?>">
	<div class="form-group">
		    <label>Employe Name</label>
		       	<input type="text" class="form-control	" name="employee_name" id="employee_name" value="<?php echo $employee_name;?>">
	</div>
	<div class="form-group">
		    <label>Destination</label>
		       	<input type="text" class="form-control	" name="destination" id="destination" value="<?php echo $destination;?>">
	</div>
	<div class="form-group">
		    <label>Purpose</label>
		       	<input type="text" class="form-control	" name="purpose" id="purpose" value="<?php echo $purpose;?>">
	</div>
	<div class="form-group">
		    <label>Date</label>
		       	<input type="date" class="form-control	" name="date" id="date" value="<?php echo $date;?>">
	</div>
	<div class="form-group">
		    <label>Time</label>
		       	<input type="text" class="form-control	" name="time" id="time" value="<?php echo $time;?>">
	</div>
	<div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    <input type="submit" class="btn btn-primary" value="Save" name="save" id="save">
	</div>	
</form>

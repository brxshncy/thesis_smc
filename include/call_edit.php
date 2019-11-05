<?php 

require ('db.php');

if(isset($_POST['edit'])){
	$id = $_POST['edit'];
	$view_calls = "SELECT * FROM call_logs WHERE id ='$id'";
	$result = $conn->query($view_calls) or trigger_error(mysqli_error($conn)." ".$view_calls);
	while($row = mysqli_fetch_assoc($result)){ ?>
		<div class="form-group">
				<input type="hidden" name="update_id" value="<?php echo $row['id'] ?>">
                                    <label class="text-danger">*Name of Caller</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name'] ?>" >
                                </div>
                                <div class="form-group">
                                    <label class="text-danger">*Reason for Calling</label>
                                    <textarea name="reason_call" id="reason_call" value="<?php echo $row['reason_call'] ?>" class="form-control" > <?php echo $row['reason_call'] ?></textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label>*Number of Caller</label>
                                        <input type="number" name="number_caller" id="number_caller" value="<?php echo $row['number_caller'] ?>" class="form-control">
                                    </div>
                                    <div class="col col-md-6">
                                        <label>*Date of Call</label>
                                        <input type="date" name="date_call" id="date_call" value="<?php echo $row['date_call'] ?>" class="form-control">
                                    </div>
                                 </div>
                                 <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>Time of Call</label>
                                        <input type="text" name="time_call" id="time_call" value="<?php echo $row['time_call'] ?>" class="form-control">
                                    </div>
                                     <div class="col-md-6">
                                        <label>Address of Incident</label>
                                        <input type="text" name="address_incident" id="address_incident" value="<?php echo $row['address_incident'] ?>" class="form-control">
                                    </div>
                                </div>
                         </div>


<?php	}
}

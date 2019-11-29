<?php 

require ('db.php');

if(isset($_POST['view'])){
	$id = $_POST['view'];
	$view_calls = "SELECT * FROM emergency_call WHERE id ='$id'";
	$result = $conn->query($view_calls) or trigger_error(mysqli_error($conn)." ".$view_calls);
	while($row = mysqli_fetch_assoc($result)){ 
        $patient = $row['p_fname']." ".$row['p_lname'];
        $caller = $row['c_fname']." ".$row['c_lname'];
    ?>
	<div class="row">
        <div class="col">
            <p class="text-danger">*Patient Info</p>
        </div>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col col-md-6">
            <input type="text" value="<?php echo $row['p_fname']; ?>" class="form-control" disabled>
        </div>
        <div class="col col-md-6">
            <input type="text" value="<?php echo $row['p_lname']; ?>" class="form-control" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="text-danger">*Caller Info</p>
        </div>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col col-md-6">
            <input type="text" value="<?php echo $row['c_fname']; ?>" class="form-control" disabled>
        </div>
        <div class="col col-md-6">
            <input type="text" value="<?php echo $row['c_lname']; ?>" class="form-control" disabled>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label class="text-danger">*Chief Complaints</label>
        <textarea name="reason_call" id="reason_call" value="<?php echo $row['reason_call'] ?>" class="form-control" disabled  rows="4"> <?php echo $row['reason_call'] ?></textarea>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col col-md-6">
            <label>*Number of Caller</label>
            <input type="number" name="number_caller" id="number_caller" value="<?php echo $row['number_caller'] ?>" class="form-control" disabled>
        </div>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col col-md-6">
            <label>*Date of Call</label>
            <input type="text" name="date_call" id="date_call" value="<?php echo $row['date_call'] ?>" class="form-control" disabled>
        </div>
        <div class="col col-md-6">
            <label>Time of Call</label>
            <input type="text" placeholder="Time of Call" class="form-control" value="<?php echo $row['call_time'] ?>" name="call_time" disabled>
        </div>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col-md-12">
            <label>Address of Incident</label>
            <input type="text" name="address_incident" id="address_incident" value="<?php echo $row['address_incident'] ?>" class="form-control" disabled>
        </div>
    </div>
     <div class="row form-group">
        <div class="col-md-12">
            <label>Hospital (transfer)</label>
            <input type="text" name="address_incident" id="address_incident" value="<?php echo $row['hospital'] ?>" class="form-control" disabled>
        </div>
    </div>
                        
<?php	}
}

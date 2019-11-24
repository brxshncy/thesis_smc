<?php 

require ('db.php');
if(isset($_POST['edit'])){
$id = $_POST['edit'];
$view_calls = "SELECT * FROM emergency_call WHERE id ='$id'";
$result = $conn->query($view_calls) or trigger_error(mysqli_error($conn)." ".$view_calls);
while($row = mysqli_fetch_assoc($result)){ ?>
	<div class="row">
        <div class="col">
            <p class="text-danger">*Patient Info</p>
        </div>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col col-md-6">
            <input type="text" name="p_fname" id="p_fname" class="form-control" placeholder="Patient First Name" >
        </div>
        <div class="col col-md-6">
            <input type="text" name="p_lname" id="p_lname" class="form-control" placeholder="Patient Last Name">
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
            <input type="text" name="c_fname" id="c_fname" class="form-control" placeholder="First Name">
         </div>
        <div class="col col-md-6">
            <input type="text" name="c_lname" id="c_lname" class="form-control" placeholder="Last Name">
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label class="text-danger">*Chief Complaints</label>
        <textarea name="reason_call" id="reason_call" class="form-control" rows="4"></textarea>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col col-md-6">
            <label>*Number of Caller</label>
            <input type="number" name="number_caller" id="number_caller" class="form-control">
        </div>
        <div class="col col-md-6">
            <label>*Date of Incident</label>
            <input type="date" name="date_call" id="date_call" class="form-control">
        </div>
    </div>
                                 <hr>
                                 <div class="row form-group mt-2">
                                   <div class="col col-md-6">
                                    <div class="input-group date" id="call_time" data-target-input="nearest">
                                      <input type="text" placeholder="Time of Call" class="form-control datetimepicker-input" data-target="#call_time" name="call_time" required="">
                                      <div class="input-group-append" data-target="#call_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                      </div>
                                    </div>
                                   </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                   <div class="col-md-12">
                                        <label>Address of Incident</label>
                                        <input type="text" name="address_incident" id="address_incident" class="form-control">
                                    </div>
                                </div>
                                 <div class="row form-group">
                                   <div class="col-md-12">
                                        <label>Hospital (transfer)</label>
                                        <input type="text" name="hospital" id="hospital" class="form-control">
                                    </div>
                                </div>
                         </div


<?php	}
}

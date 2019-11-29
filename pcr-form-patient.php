<input type="hidden" class="form-control" name="status" id="status" value="unread" readonly>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>First Name</label>
                        <input type="text" class="form-control" name= "firstname" id="firstname" required="">
                    </div>
                    <div class="form-group col-md-5 ">
                        <label for="inputPassword4">Last Name</label>
                        <input type="text" class="form-control" name= "lastname" id="lastname" required>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Middle Initial</label>
                        <input type="text" class="form-control" name= "mi" id="mi" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label>Age</label>
                        <input type="text" class="form-control" name= "age" id="age" required>
                    </div>
                    <div class="form-group col-md-4 ml-2">
                        <label>Religion</label>
                        <input type="text" class="form-control" name= "religion" id="religion"  required>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Nationality</label>
                        <input type="text" class="form-control" name= "nationality" id="nationality" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Home Address</label>
                        <input type="text" class="form-control" name="home_address" id="home_address" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label class=" form-control-label" for="gender">Gender</label>
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Male" required>Male
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Female">Female
                    </div>          
                </div>
                <hr>
                 <div class="row form-group">
                    <div class="col">
                        <label class=" form-control-label" for="poi" >Place of Incidence (Please Select)</label>
                        <input type="radio" class="ml-2 mr-2" name="poi" id="scene" value="Scene">Scene
                        <input type="radio" class="ml-2 mr-2" name="poi" id="med" value="Medical Facility">Medical Facility
                    </div>
                    <div class="col form-inline">
                        <?php
                            date_default_timezone_set("Asia/Manila");
                            $date = date("F j, Y");
                        ?>
                        <label for="date_i">Date of Incident</label>
                        <input type="text" value="<?php echo $date ?>"name="date_i" id="date_i" class="form-control col-md-6 ml-3" readonly>
                    </div>
                </div>
                <div class="form-row mt-4" id="scene_field">
                        <div class="form-group col-md-3">
                            <label>Barangay</label>
                            <select name="barangay" id="barangay" class="form-control form-control-lg" style="height:38px;" >
                                <option value="">Select Barangay</option>
                                <?php 
                                    $barangay = "SELECT * FROM barangay";
                                    $run_query = $conn->query($barangay) or trigger_error(mysqli_error($conn)." ".$barangay);
                                    while($row = mysqli_fetch_assoc($run_query)){ ?>
                                        <option value = "<?php echo $row['id'] ?>"><?php echo $row['baranggay_name'] ?></option>

                                 <?php  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-9">
                            <label>(Purok Street Name, City)</label>
                            <input type="text" class="form-control" name= "incident_address" id="incident_address" >
                        </div>
                </div>
                <div class="form-row mt-4" id="med_field">
                    <div class="form-group col-md-8">
                        <label>Medical Facility Name</label>
                        <input type="text" name="med_facility" class="form-control" id="med_facility">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-3">
                        <label>Time of Incident</label>
                        <input type="time" name="time_i" class="form-control" id="time_i" required>
                    </div>
                </div>
                <hr>
               <div class="row">
                    <div class="col col-md-102">
                        <div class="form-group">
                            <label>Chief Complaints / Reason for Calling</label>
                            <textarea class="form-control mt-1"  name="complaints" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <hr>
<div class="row">
    <div class="col">
        <h3>Endorsement</h3>
    </div>
</div>
<div class="form-row mt-4">
    <div class="form-group col-md-6">
        <label>Receiving Facility</label>
        <input type="text" class="form-control" name="receiving_facility" id="receiving_facility">
    </div>
        <div class="col">
        <label>Receiving MD/RN/Relative</label>
        <input type="text" class="form-control" name="receiving_md" id="receiving_md">
        </div> 
    </div>
<hr>
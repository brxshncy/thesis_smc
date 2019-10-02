<?php
include 'db.php';
global $conn;

	if(isset($_POST['edit_id'])){
		$id = $_POST['edit_id'];

		$fetch = "SELECT * FROM pcr_official WHERE id = '$id' ";
		$result = mysqli_query($conn,$fetch);
		while($data = mysqli_fetch_array($result)){
				$id = $data['id'];
				$firstname = $data['firstname'];
				$lastname = $data['lastname'];
				$mi = $data['middlename'];
				$age = $data['age'];
				$religion = $data['religion'];
				$nationality = $data['nationality'];
				$gender = $data['gender'];
				$address = $data['address'];
				$date_i = $data['date_i'];
				$time_i = $data['time_i'];
				$impression = $data['impression'];
				$r_p1 = $data['r_p1'];
				$contact1 = $data['contact1'];
				$r_p2 = $data['r_p2'];
				$contact2 = $data['contact2'];
				$reason = $data['reason'];
				$nature =$data['nature'];
				$neuro = $data['neuro'];
				$call_recieve = $data['call_recieve'];
				$arrive_scene = $data['arrive_scene'];
				$left_scene = $data['left_scene'];
				$arrive_destination = $data['arrive_destination'];
				$back_service = $data['back_service'];
				$airway = $data['airway'];
				$breathing = $data['breathing'];
				$pupils = $data['pupils'];
				$pulse = $data['pulse'];
				$skin = $data['skin'];
				$skin_texture = $data['skin_texture'];
				$crt = $data['crt'];
				$time_vs= $data['time_vs'];
				$bp = $data['bp'];
				$pr = $data['pr'];
				$rr = $data['rr'];
				$temp = $data['temp'];
				$stat = $data['02stat'];
				$eye = $data['eye'];
				$verbal = $data['verbal'];
				$motor = $data['motor'];
				$total = $data['total'];
				$symtomps = $data['symtomps'];
				$allergies = $data['allergies'];
				$meds = $data['meds'];
				$past_ill= $data['past_ill'];
				$oral_intake= $data['oral_intake'];
				$time_oral= $data['time_oral'];
				$onset= $data['onset'];
				$provocation= $data['provocation'];
				$quality= $data['quality'];
				$radiation= $data['radiation'];           
				$severity= $data['severity'];
				$timing_i= $data['timing_i'];
				$events_prior= $data['events_prior'];
				$trauma = $data['trauma'];
				$burn = $data['burn'];
				$treatment = $data['treatment'];
				$narrative = $data['narrative'];
				$transport_officer = $data['transport_officer'];
				$treatment_officer = $data['treatment_officer'];
				$dispatched_unit = $data['dispatched_unit'];
				$desti_deter = $data['desti_deter'];
				$response_mode = $data['response_mode'];
				$transport_mode = $data['transport_mode'];
				$receiving_facility = $data['receiving_facility'];
				$receiving_md = $data['receiving_md'];

				
		}
	}


?>

<div class="row">
     <div class="col">
          <div class="card">
               <div class="card-header" align="center" style="height:60px,padding:auto;">
                 <h4> Pre Hospital Patient Care Report Form</h4>
                </div><!-- end of card header -->
                     <br>
                        <div class="card-title">
                             <h3 class="text-center title-2">Patient's Personal Information</h3>
                        </div><!--end of card title -->
                         <hr>
                         <div class="card-body card-block">
                            <form action ="include/update_data.php" method="POST">
                                <input type="hidden" name="update_id" id="update_id" value="<?php echo $id;?>">
                                <div class="row">
                                  <div class="col">
                                        
                                 </div><!--end of col-6-->
                             </div>
                                <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">First Name</label>
                                                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname; ?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                                 <div class="row">
                                     <div class="col">
                                         <div class="form-group">
                                             <label for="email-input" class=" form-control-label">Last Name</label>
                                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname; ?>">
                                     </div><!--end of form-group-->
                                </div><!--end of col-6-->
                             </div><!-- end of row--> 
                             <div class="row">
                                 <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class="form-control-label">M.I.</label>
                                            <input type="text" name="mi" id= "mi"  class="form-control sm-1" value="<?php echo $mi; ?>">
                                        </div>
                                 </div>
                            <div class="col-6">
                                            <label for="email-input" class=" form-control-label">Age</label>
                                            <input type="text"name="age" id= "age"  class="form-control" value="<?php echo $age; ?>">
                                 </div>
                           </div><!--end of row-->
                           <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Religion</label>
                                     <input type="text" name="religion" id= "" class="form-control" value="<?php echo $religion;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                                     <div class="col-6">
                                         <div class="form-group">
                                             <label for="email-input" class=" form-control-label">nationality </label>
                                     <input type="text" name="nationality" id= "nationality" class="form-control" value="<?php echo $nationality;?>">
                                     </div><!--end of form-group-->
                                </div><!--end of col-6-->
                          </div><!-- end of row-->
                          <div class="row form-group">
                                       <div class="col col-md-3">
                                           <label class=" form-control-label">Gender</label>
                                       </div>
                          <div class="col col-md-9">
                                 <div class="form-check">
                                         <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="gender" name="gender" value="Male" class="form-check-input">Male
                                             </label>
                                        </div>
                                          <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                             <input type="radio" id="gender" name="gender" value="Female" class="form-check-input">Female
                                             </label>
                                        </div>
                                </div><!--end of form-check-->
                             </div><!-- end of col-->
                        </div><!-- end of row form-group-->
                         <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $address;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
<div class="row">
    <div class="col">
         <div class="card">
               <div class="card-header" align="center" style="height:60px,padding:auto;">
                    <h4> Vital Signs Information</h4>
               </div><!-- end of card header -->
               <div class="card-body card-block">
                    <div class="row">
                       <div class="col-6">
                          <div class="form-group">
                                    <label for="email-input" class=" form-control-label">Time</label>
                                     <input type="text" name="time_vs" id="time_vs" class="form-control" value="<?php echo $time_vs;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                            <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Blood Pressure</label>
                                                  <input type="text" name="bp" id="bp" class="form-control"value="<?php echo $bp;?>">
                                         </div><!--end of form-group-->
                             </div><!--end of col-6--> 
                     </div>
                      <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Prothrombin Ratio</label>
                                     <input type="text" name="pr" id="pr" class="form-control" value="<?php echo $pr ;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                                 <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Risk Ratio</label>
                                     <input type="text" name="rr" id="rr" class="form-control" value="<?php echo $rr ;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                              <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Temperature</label>
                                     <input type="text" name="temp" id="temp" class="form-control"value="<?php echo $temp;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                                 <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">02 Stat</label>
                                     <input type="text" name="stat" id="stat" class="form-control" value="<?php echo $stat;?>"
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                         </div>
                             <div class="row form-group">
                                    <div class="col col-sm-3">
                                         <label for="multiple-select" class=" form-control-label">Eye</label>
                                    </div>
                                 <div class="col col-sm-9">
                                         <select name="eye" id="eye" class="form-control-lg form-control">
                                                 <option value="4">4</option>
                                                 <option value="3">3</option>
                                                 <option value="2">2</option>
                                                 <option value="1">1</option>                                                                                             
                                         </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                 <div class="col col-md-3">
                                         <label for="multiple-select" class=" form-control-label">Verbal</label>
                                 </div>
                                 <br>
                                 <div class="col col-md-9">
                                         <select name="verbal" id="verbal" class="form-control-lg form-control">
                                                <option value="5">5</option>
                                                 <option value="4">4</option>
                                                 <option value="3">3</option>
                                                 <option value="2">2</option>
                                                 <option value="1">1</option>                                                                                             
                                         </select>
                                </div>
                           </div>
                            <div class="row form-group">
                                 <div class="col col-md-3">
                                         <label for="multiple-select" class=" form-control-label">Motor</label>
                                 </div>
                                 <br>
                                 <div class="col col-md-9">
                                         <select name="motor" id="motor" class="form-control-lg form-control">
                                                 <option value="6">6</option>
                                                 <option value="5">5</option>
                                                 <option value="4">4</option>
                                                 <option value="3">3</option>
                                                 <option value="2">2</option>
                                                 <option value="1">1</option>                                                                                             
                                         </select>
                                </div>
                           </div>
                           <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Total</label>
                                     <input type="text" name="total" id="total" class="form-control" value="<?php echo $total;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
            </div><!-- end of card body-->
         </div><!--end of card main-->
    </div><!--end of col main-->
</div> <!--end of row main-->
<div class="row">
    <div class="col">
          <div class="card">
                 <div class="card-header" align="center" style="height:60px,padding:auto;">
                       <h4> Incident Information</h4>
                 </div><!-- end of card header -->
                  <div class="card-body card-block">
                    <div class="row">
                               <div class="col">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Date of Incident</label>
                                     <input type="date" name="date_i" id="date_i" class="form-control" value="<?php echo $date_i;?>">
                              </div><!--end of form-group-->
                         </div><!--end of col-6-->
                    </div>
                    <div class="row">
                             <div class="col-6">
                                   <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Time of Incident</label>
                                             <input type="text" name="time_i" id="time_i" class="form-control" value="<?php echo $time_i;?>">
                                    </div><!--end of form-group-->
                            </div><!--end of col-6-->
                     </div>
                     <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">General Impression</label>
                                <input type="text" name="impression" id="impression"class="form-control" value="<?php echo $impression;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                    <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Reason for Calling/Chief Complaints</label>
                                <input type="text" name="reason" id="reason" class="form-control" value="<?php echo $reason;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                             <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Relation to Patient </label>
                                        <input type="text" name="r_p1" id="r_p1"class="form-control" value="<?php echo $r_p1;?>">
                            </div>
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Contact Number</label>
                                        <input type="text"name="contact1" id="contact1" class="form-control" value="<?php echo $contact1;?>">
                                </div>       
                             </div>
                             <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Relation to Patient </label>
                                        <input type="text" name="r_p2" id="r_p2"class="form-control" value="<?php echo $r_p2;?>">
                            </div>
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Contact Number</label>
                                        <input type="text"name="contact2" id="contact2" class="form-control" value="<?php echo $contact2;?>">
                                </div>       
                             </div>
                             <br>
                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Nature of Incident</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="nature" name="nature" value="Medical" class="form-check-input">Medical
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="nature" name="nature" value="Trauma" class="form-check-input">Trauma
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="nature" name="nature" value="Fire Response" class="form-check-input">Fire Response
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="nature" name="nature" value="V A" class="form-check-input">V A
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Neuro</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="neuro" name="neuro" value="Alert" class="form-check-input">Alert
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="neuro" name="neuro" value="Oriented" class="form-check-input">Oriented
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="neuro" name="neuro" value="Confused" class="form-check-input">Confused
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Call Recieve</label>
                                     <input type="text" name="call_recieve" id="call_recieve" class="form-control" value="<?php echo $call_recieve;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                                 <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Arrived at Scene</label>
                                     <input type="text" name="arrive_scene" id="arrive_scene" class="form-control" value="<?php echo $arrive_scene;?>"">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                             <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Time Left Scene</label>
                                     <input type="text" name="left_scene" id="left_scene" class="form-control" value="<?php echo $left_scene;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                                 <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Arrived at Destination</label>
                                     <input type="text" name="arrive_destination" id="arrive_destination" class="form-control" value="<?php echo $arrive_destination;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                             <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Back in Service</label>
                                     <input type="text" name="back_service" id="back_service" class="form-control" value="<?php echo $back_service; ?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Airway</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="airway" name="airway" value="Patent " class="form-check-input">Alert
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="airway" name="airway" value="Impaired" class="form-check-input">Oriented
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Breathing</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="breathing" id="breathing" class="form-control-lg form-control">
                                                        <option value="Unlabored">Unlabored</option>
                                                        <option value="Labored ">Labored </option>
                                                        <option value="Deep ">Deep</option>
                                                        <option value="Retraction ">Retraction </option>
                                                        <option value="Shallow ">Shallow </option>
                                                        <option value="Absent">Absent</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Pupils</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="pupils" id="pupils" class="form-control-lg form-control">
                                                        <option value="Normal/Pearl">Normal/Pearl</option>
                                                        <option value="Constricted(Left/Right)">Constricted(Left/Right) </option>
                                                        <option value="Dilated(Left/Right)">Dilated(Left/Right) </option>
                                                        <option value="No Reaction (Left/Right)">No Reaction (Left/Right)  </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Pulse</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="pulse" id="pulse" class="form-control-lg form-control">
                                                        <option value="Normal ">Normal</option>
                                                        <option value="Strong ">Strong  </option>
                                                        <option value="Weak">Weak </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Skin</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="skin" id="skin" class="form-control-lg form-control">
                                                        <option value="Normal ">Normal</option>
                                                        <option value="Cyanotic  ">Cyanotic   </option>
                                                        <option value="Pale ">Pale  </option>
                                                         <option value="Clammy ">Clammy </option>
                                                          <option value="Jaundice ">Jaundice </option>
                                                           <option value="Flushed ">Flushed </option>
                                                             <option value="Ashen ">Ashen </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Skin Texture</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="skin_texture" id="skin_texture" class="form-control-lg form-control">
                                                        <option value="Normal ">Normal</option>
                                                        <option value="Moist   ">Moist   </option>
                                                        <option value="Dry  ">Dry  </option>
                                                         <option value="Diaphoretic ">Diaphoretic </option>
                                                          
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">CRT</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="crt" id="crt" class="form-control-lg form-control">
                                                        <option value="Prolonged(>2 seconds)">Prolonged(>2 seconds)</option>
                                                        <option value="Normal(>2 seconds)">Normal(>2 seconds)</option>
                                                   </select>
                                                </div><!-- end of col col-md-9-->
                                            </div> <!-- end of row form-group-->
                  </div><!-- end of card body-->
          </div><!--end of card main-->
    </div><!--end of col main-->
</div><!--end of row main-->   
<div class="row">
     <div class="col">
        <div class="card">
                <div class="card-header" align="center" style="height:60px,padding:auto;">
                          <h4> Assesment</h4>
                </div><!-- end of card header -->
                 <div class="card-body card-block">
                    <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Signs And Symptomps</label>
                                        <input type="text" name="symtomps" id="symtomps"class="form-control" value="<?php echo $symtomps;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Allergies</label>
                                        <input type="text"name="allergies" id="allergies" class="form-control" value="<?php echo $allergies;?>">
                                </div>       
                     </div>
                             <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Meds</label>
                                        <input type="text" name="meds" id="symtomedsmps"class="form-control" value="<?php echo $meds;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Past Illness</label>
                                        <input type="text"name="past_ill" id="past_ill" class="form-control" value="<?php echo $past_ill;?>">
                                </div>       
                             </div>
                             <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                            <label for="email-input" class=" form-control-label">Last Oral Intake</label>
                                     <input type="text" name="oral_intake" id="oral_intake" class="form-control" value="<?php echo $oral_intake;?>">
                                         </div><!--end of form-group-->
                                 </div><!--end of col-6-->
                             </div>
                             <div class="row">
                                 <div class="col">
                                        <label for="email-input" class=" form-control-label">Time Incident</label>
                                        <input type="text" name="time_oral" id="time_oral"class="form-control" value="<?php echo $time_oral;?>">
                            </div>
                             </div>
                             <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Onset</label>
                                        <input type="text" name="onset" id="onset"class="form-control" value="<?php echo $onset;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Provocation</label>
                                        <input type="text"name="provocation" id="provocation" class="form-control" value="<?php echo $provocation;?>">
                                </div>       
                             </div>
                             <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Quality</label>
                                        <input type="text" name="quality" id="quality"class="form-control" value="<?php echo $quality;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Radiation</label>
                                        <input type="text"name="radiation" id="radiation" class="form-control" value="<?php echo $radiation;?>">
                                </div>       
                             </div>
                             <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Severity</label>
                                        <input type="text" name="severity" id="severity"class="form-control" value="<?php echo $severity;?>">
                            </div>
                        </div>
                            <div class="row">
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Timing</label>
                                        <input type="text"name="timing_i" id="timing_i" class="form-control" value="<?php echo $timing_i;?>">
                                </div>       
                             </div>
                             <div class="row">
                                 <div class="col">
                                        <label for="email-input" class=" form-control-label">Events Prior</label>
                                        <input type="text" name="events_prior" id="events_prior" class="form-control" value="<?php echo $events_prior;?>">
                                </div>
                             </div>
                             <br>
                             <div class="row form-group">
                                 <div class="col col-md-3">
                                         <label for="multiple-select" class=" form-control-label">Trauma Case</label>
                                 </div>
                                 <div class="col col-md-9">
                                         <select name="trauma" id="trauma" class="form-control-lg form-control">
                                                 <option value="Alcohol Intoxication ">Alcohol Intoxication </option>
                                                 <option value="Animal Bite ">Animal Bite </option>
                                                 <option value="Drowning">Drowning </option>
                                                 <option value="Electrocution">Electrocution </option> 
                                                 <option value="Fall">Fall</option>
                                                 <option value="Gunshot Wound">Gunshot Wound</option>
                                                 <option value="Hit and Run">Hit and Run </option>
                                                 <option value="Mauling<">Mauling</option>
                                                 <option value="Stab wound<">Stab wound</option>                                                                                            
                                         </select>
                                </div>
                           </div>
                           <div class="row form-group">
                                 <div class="col col-md-3">
                                         <label for="multiple-select" class=" form-control-label">Burn (%TBSA)</label>
                                 </div>
                                 <div class="col col-md-9">
                                         <select name="burn" id="burn" class="form-control-lg form-control">
                                                 <option value="Alcohol Intoxication ">First Degree  </option>
                                                 <option value="Animal Bite ">Second Degree  </option>
                                                 <option value="Drowning">Third Degree </option>                                                                             
                                         </select>
                                </div>
                           </div>
                           <div class="row form-group">
                                 <div class="col col-md-3">
                                         <label for="multiple-select" class=" form-control-label">Treatment</label>
                                 </div>
                                 <div class="col col-md-9">
                                         <select name="treatment" id="treatment" class="form-control-lg form-control">
                                                 <option value="Adjunct ">Airway Adjunct</option>
                                                 <option value="Defibrillation  ">Defibrillation </option>
                                                 <option value="Spine Immobilization ">Spine Immobilization  </option>
                                                 <option value="Abdominal Thrust ">Abdominal Thrust  </option>
                                                 <option value="Extrication ">Extrication</option>
                                                 <option value="Suctioning">Suctioning </option>
                                                 <option value="Bandaging ">Bandaging  </option>
                                                 <option value="Rescue Breathing ">Rescue Breathing </option>
                                                 <option value="Splinting/Traction">Splinting/Traction </option>
                                                 <option value="Burn Care ">Burn Care </option>
                                                 <option value="Nebulization ">Nebulization  </option>
                                                 <option value="VS Checked  ">VS Checked  </option>
                                                 <option value="Cold Application">Cold Application  </option>
                                                 <option value="Wound Cleansing/Dressing ">Wound Cleansing/Dressing  </option>
                                                 <option value="N. CAN">N. CAN  </option> 
                                                 <option value="SFM ">SFM </option> 
                                                 <option value="NRB">NRB </option> 
                                                 <option value="CPR Cycles">CPR Cycles</option>    
                                                  <option value="Glucometer<">Glucometer</option>                                                                          
                                         </select>
                                </div>
                           </div>
                           <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Narrative Notes</label>
                                        <textarea name="narrative" id="narrative" rows="9" placholder="<?php echo $narrive; ?>" class="form-control"></textarea>
                            </div>
                        </div>
                 </div>
        </div>
     </div>  
 </div> 
<div class="row">
     <div class="col">
           <div class="card">
                 <div class="card-header" align="center" style="height:60px,padding:auto;">
                      <h4> Rescuer Information</h4>
                  </div><!-- end of card header -->
                  <div class="card-body card-block">
                    <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Transport Officer</label>
                                        <input type="text" name="transport_officer" id="transport_officer"class="form-control" value="<?php echo $transport_officer;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"> 
                                        <label for="email-input" class=" form-control-label">Treatment Officer</label>
                                        <input type="text"name="treatment_officer" id="treatment_officer" class="form-control" value="<?php echo $treatment_officer;?>">
                                </div>       
                             </div>
                              <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Dispatched Unit</label>
                                        <input type="text" name="dispatched_unit" id="dispatched_unit"class="form-control" value="<?php echo $dispatched_unit;?>">
                            </div>
                        </div>
                        <br>
                        
                        <div class="row form-group">
                                 <div class="col">
                                         <label for="multiple-select" class=" form-control-label">DESTINATION DETERMINATION</label>
                                 </div>
                                 <div class="col col-md-9">
                                         <select name="desti_deter" id="desti_deter" class="form-control-lg form-control">
                                                 <option value="Closes Facility   ">Closes Facility   </option>
                                                 <option value="Patient's Choice ">Patient's Choice  </option>
                                                 <option value="Family's Choice">Family's Choice </option>  
                                                 <option value="Medical Direction">Medical Direction</option>
                                                 <option value="Law Enforcement Choice">Law Enforcement Choice</option>
                                                 <option value="Protocol">Protocol</option>                                                                           
                                         </select>
                                </div>
                           </div>
                      
                           <div class="row form-group">
                                 <div class="col col-md-3">
                                         <label for="multiple-select" class=" form-control-label">RESPONSE MODE</label>
                                 </div>
                                 <div class="col col-md-9">
                                         <select name="response_mode" id="response_mode" class="form-control-lg form-control">
                                                 <option value="No Lights and Siren ">No Lights and Siren   </option>
                                                 <option value="Lights Only e ">Lights Only </option>
                                                 <option value="Lights and Siren">Lights and Siren </option>                                                                             
                                         </select>
                                </div>
                           </div>
                           <div class="row form-group">
                                 <div class="col col-md-3">
                                         <label for="multiple-select" class=" form-control-label">TRANSPORT MODE</label>
                                 </div>
                                 <div class="col col-md-9">
                                         <select name="transport_mode" id="transport_mode" class="form-control-lg form-control">
                                                 <option value="No Lights and Siren ">No Lights and Siren </option>
                                                 <option value="Lights Only">Lights Only  </option>
                                                 <option value="Lights and Siren ">Lights and Siren  </option>  
                                                 <option value="Upgraded to Lights and Siren">Upgraded to Lights and Siren</option>                                                                            
                                         </select>
                                </div>
                           </div>
                           <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Receiving Facility</label>
                                        <input type="text" name=" receiving_facility" id=" receiving_facility"class="form-control" value="<?php echo $receiving_facility;?>">
                            </div>
                        </div>
                        <div class="row">
                                  <div class="col">
                                        <label for="email-input" class=" form-control-label">Receiving MD/RN/Relative</label>
                                        <input type="text" name=" receiving_md" id=" receiving_md" class="form-control" value="<?php echo $receiving_md;?>">
                            </div>
                        </div>
                  </div>
       </div>
     </div>
</div>                   
           

                       
                             <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                         <input type="submit" class="btn btn-primary" id="update" name="update" values="Update Changes">
                            </div>

                   </form><!--end of form-->
               </div><!--end of card body-->
        </div><!--end of card-->
  </div>  <!--end of col-->                 
    </div><!--end of row main-->             

                        
<style>
	.form-control{
		border: 0;
	}
</style>
<?php
include 'include/db.php';
session_start();
?>
<form action="include/pcr_submit.php" method="post">
		<table class="table table-bordered">
					<tbody>
						<?php
							if(isset($_POST['id'])){
							$id = $_POST['id'];
								
								$sender = "SELECT un.id as u_id FROM unit_name un LEFT JOIN  pcr p ON p.team = un.id WHERE un.id = '$id'";
								$qry = $conn->query($sender);
								$id_sender = mysqli_fetch_object($qry);

								$query = "SELECT * FROM pcr WHERE id = '$id' ";
								$view = mysqli_query($conn, $query);
								while($row = mysqli_fetch_array($view)){

	
						?>
							
						<input type="hidden" value="<?php echo $row['id'];?>" name="id">
						<input type="hidden" value="read" name="status">
							<tr class="table-info">
								<th colspan = 2><h2 style="color:#fff;" align="center">Patient Personal Information</h2></th>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">First Name</th>
								<td width="70%" class="bg-light"><input type="text" name ="firstname" class="form-control" value="<?php echo $row['firstname'];?> " readonly> 
								</td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Last Name</th>
								<td width="70%" class="bg-light"><input type="text" name ="lastname" class="form-control" value="<?php echo $row['lastname'];?>" readonly> 
								</td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Middle Name</th>
								<td width="70%" class="bg-light"><input type="text" name ="middlename" class="form-control" value="<?php echo $row['middlename'];?>"readonly> 
								</td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Address</td>
								<td width="70%" class="bg-light"><input type="text" name ="address" class="form-control" value="<?php echo $row['address'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Age</td>
								<td width="70%" class="bg-light"><input type="text" name ="age" class="form-control" value="<?php echo $row['age'];?>" readonly></td>
							</tr>					
							<tr class="table-active">
								<td width="30%" class="bg-light">Gender</td>
								<td width="70%" class="bg-light"><input type="text" name ="gender" class="form-control" value="<?php echo $row['gender'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Religion</td>
								<td width="70%" class="bg-light"><input type="text" name ="religion" class="form-control" value="<?php echo $row['religion'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Nationality</td>
								<td width="70%" class="bg-light"><input type="text" name ="nationality" class="form-control" value="<?php echo $row['nationality'];?>" readonly></td>
							</tr>
							<tr class="table-info">								
								<th colspan = 2 style="border-top:1px solid black;"><h2 style="color:#fff;" align="center">Incident Information</h2></th>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Date of Incident</td>
								<td width="70%" class="bg-light"><input type="text" name ="date_i" class="form-control" value="<?php echo $row['date_i'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Incident Time</td>
								<td width="70%" class="bg-light"><input type="text" name ="time_i" class="form-control" value="<?php echo $row['time_i'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td clwidth="30%" class="bg-light">General Impression</td>
								<td width="70%" class="bg-light"><input type="text" name ="impression" class="form-control" value="<?php echo $row['impression'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Reason for Calling/Chief Complaints</td>
								<td width="70%" class="bg-light"><input type="text" name ="reason" class="form-control" value="<?php echo $row['reason'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Caller Relation to Patient</td>
								<td width="70%" class="bg-light"><input type="text" name ="r_p1" class="form-control" value="<?php echo $row['r_p1'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Contact Number</td>
								<td width="70%" class="bg-light"><input type="text" name ="contact1" class="form-control" value="<?php echo $row['contact1'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Caller Relation to Patient</td>
								<td width="70%" class="bg-light"><input type="text" name ="r_p2" class="form-control" value="<?php echo $row['r_p2'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Contact Number</td>
								<td width="70%" class="bg-light"><input type="text" name ="contact2" class="form-control" value="<?php echo $row['contact2'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Nature of Incident</td>
								<td width="70%" class="bg-light"><input type="text" name ="nature" class="form-control" value="<?php echo $row['nature'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Neuro</td>
								<td width="70%" class="bg-light"><input type="text" name ="neuro" class="form-control" value="<?php echo $row['neuro'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Call Recieve</td>
								<td width="70%" class="bg-light"><input type="text" name ="call_recieve" class="form-control" value="<?php echo $row['call_recieve'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Unit Enroute</td>
								<td width="70%" class="bg-light"><input type="text" name ="unit_enroute" class="form-control" value="<?php echo $row['unit_enroute'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Arrived at Scene</td>
								<td width="70%" class="bg-light"><input type="text" name ="arrive_scene" class="form-control" value="<?php echo $row['arrive_scene'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Time Left Scene</td>
								<td width="70%" class="bg-light"><input type="text" name ="left_scene" class="form-control" value="<?php echo $row['left_scene'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Arrived at Destination</td>
								<td width="70%" class="bg-light"><input type="text" name ="arrive_destination" class="form-control" value="<?php echo $row['arrive_destination'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Back in Service</td>
								<td width="70%" class="bg-light"><input type="text" name ="back_service" class="form-control" value="<?php echo $row['back_service'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Airway</td>
								<td width="70%" class="bg-light"><input type="text" name ="airway" class="form-control" value="<?php echo $row['airway'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Breathing</td>
								<td width="70%" class="bg-light"><input type="text" name ="breathing" class="form-control" value="<?php echo $row['breathing'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Pupils</td>
								<td width="70%" class="bg-light"><input type="text" name ="pupils" class="form-control" value="<?php echo $row['pupils'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Pulse</td>
								<td width="70%" class="bg-light"><input type="text" name ="pulse" class="form-control" value="<?php echo $row['pulse'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td cwidth="30%" class="bg-light">Skin</td>
								<td width="70%" class="bg-light"><input type="text" name ="skin" class="form-control" value="<?php echo $row['skin'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Skin Texture</td>
								<td width="70%" class="bg-light"><input type="text" name ="skin_texture" class="form-control" value="<?php echo $row['skin_texture'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">CRT</td>
								<td width="30%" class="bg-light"><input type="text" name ="crt" class="form-control" value="<?php echo $row['crt'];?>" readonly></td>
							</tr>
							<tr class="table-info">
								<th colspan = 2 ><h2 style="color:#fff;" align="center">Vital Signs Information</h2></th>
								
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Time</td>
								<td width="70%" class="bg-light"><input type="text" name ="time_vs" class="form-control" value="<?php echo $row['time_vs'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Blood Pressure</td>
								<td width="70%" class="bg-light"><input type="text" name ="bp" class="form-control" value="<?php echo $row['bp'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Pulse Rate</td>
								<td width="70%" class="bg-light"><input type="text" name ="pr" class="form-control" value="<?php echo $row['pr'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Risk Ratio</td>
								<td width="70%" class="bg-light"><input type="text" name ="rr" class="form-control" value="<?php echo $row['rr'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Temperature</td>
								<td width="70%" class="bg-light"><input type="text" name ="temp" class="form-control" value="<?php echo $row['temp'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">02 Stat</td>
								<td width="70%" class="bg-light"><input type="text" name ="stat" class="form-control" value="<?php echo $row['02stat'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Eye</td>
								<td width="70%" class="bg-light"><input type="text" name ="eye" class="form-control" value="<?php echo $row['eye'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Verbal</td>
								<td width="70%" class="bg-light"><input type="text" name ="verbal" class="form-control" value="<?php echo $row['verbal'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Motor</td>
								<td width="70%" class="bg-light"><input type="text" name ="motor" class="form-control" value="<?php echo $row['motor'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Total</td>
								<td width="70%" class="bg-light"><input type="text" name ="total" class="form-control" value="<?php echo $row['total'];?>" readonly></td>
							</tr>
							<tr class="table-info">
								<th colspan = 2><h2 style="color:#fff;" align="center">Assesment</h2></th>
								
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Signs and Symtomps</td>
								<td width="70%" class="bg-light"><input type="text" name ="symtomps" class="form-control" value="<?php echo $row['symtomps'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Allergies</td>
								<td width="70%" class="bg-light"><input type="text" name ="allergies" class="form-control" value="<?php echo $row['allergies'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Meds</td>
								<td width="70%" class="bg-light"><input type="text" name ="meds" class="form-control" value="<?php echo $row['total'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Past Illness</td>
								<td width="70%" class="bg-light"><input type="text" name ="past_ill" class="form-control" value="<?php echo $row['past_ill'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Last Oral Intake</td>
								<td width="70%" class="bg-light"><input type="text" name ="oral_intake" class="form-control" value="<?php echo $row['oral_intake'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Time Oral Intake </td>
								<td width="70%" class="bg-light"><input type="text" name ="time_oral" class="form-control" value="<?php echo $row['time_oral'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Onset</td>
								<td width="70%" class="bg-light"><input type="text" name ="onset" class="form-control" value="<?php echo $row['onset'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Provocation</td>
								<td width="70%" class="bg-light"><input type="text" name ="provocation" class="form-control" value="<?php echo $row['provocation'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Quality</td>
								<td width="70%" class="bg-light"><input type="text" name ="quality" class="form-control" value="<?php echo $row['quality'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Radiation</td>
								<td width="70%" class="bg-light"><input type="text" name ="radiation" class="form-control" value="<?php echo $row['radiation'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Severity</td>
								<td width="70%" class="bg-light"><input type="text" name ="severity" class="form-control" value="<?php echo $row['severity'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Timing</td>
								<td width="70%" class="bg-light"><input type="text" name ="timing_i" class="form-control" value="<?php echo $row['timing_i'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Events Prior</td>
								<td width="70%" class="bg-light"><input type="text" name ="events_prior" class="form-control" value="<?php echo $row['events_prior'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Trauma Case</td>
								<td width="70%" class="bg-light"><input type="text" name ="trauma" class="form-control" value="<?php echo $row['trauma'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Burn (%TBSA)</td>
								<td width="70%" class="bg-light"><input type="text" name ="burn" class="form-control" value="<?php echo $row['burn'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Treatment</td>
								<td width="70%" class="bg-light"><input type="text" name ="treatment" class="form-control" value="<?php echo $row['treatment'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Narrative</td>
								<td width="70%" class="bg-light"><input type="text" name ="narrative" class="form-control" value="<?php echo $row['narrative'];?>" readonly></td>
							</tr>
							<tr class="table-info">
								<th colspan = 2><h2 style="color:#fff;" align="center">Rescuer Information</h2></th>
								
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Transport Officer</td>
								<td width="70%" class="bg-light"><input type="text" name ="transport_officer" class="form-control" value="<?php echo $row['transport_officer'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Treatment Officer</td>
								<td width="70%" class="bg-light"><input type="text" name ="treatment_officer" class="form-control" value="<?php echo $row['treatment_officer'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Dispatched Unit</td>
								<td width="70%" class="bg-light"><input type="text" name ="dispatched_unit" class="form-control" value="<?php echo $row['dispatched_unit'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">DESTINATION DETERMINATION</td>
								<td width="70%" class="bg-light"><input type="text" name ="desti_deter" class="form-control" value="<?php echo $row['desti_deter'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">RESPONSE MODE</td>
								<td width="70%" class="bg-light"><input type="text" name ="response_mode" class="form-control" value="<?php echo $row['response_mode'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">TRANSPORT MODE</td>
								<td width="70%" class="bg-light"><input type="text" name ="transport_mode" class="form-control" value="<?php echo $row['transport_mode'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Receiving Facility</td>
								<td width="70%" class="bg-light"><input type="text" name ="receiving_facility" class="form-control" value="<?php echo $row['receiving_facility'];?>" readonly></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Receiving MD/RN/Relative</td>
								<td width="70%" class="bg-light"><input type="text" name ="receiving_md" class="form-control" value="<?php echo $row['receiving_md'];?>" readonly></td>
							</tr>
							<tr>
								<td colspan="2" class="bg-light" align="center"><button type="submit" name="upload" class="btn btn-block btn-success">Submit</button></td>
							</tr>
							<?php
									}
							}
							?>
					</tbody>

				</table> 

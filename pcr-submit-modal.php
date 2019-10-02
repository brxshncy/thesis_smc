<?php
session_start();
include 'include/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$submit_pcr = "SELECT * FROM pcr WHERE id = '$id' ";
		$result = $conn->query($submit_pcr) or trigger_error(mysqli_error($conn)." ".$submit_pcr);

		while($row = mysqli_fetch_assoc($result)) {
		?>
	<div class="hide">
		<div class="form-row">
		  <div class="form-group col-md-5">
                        <label>First Name</label>
                        <input type="text" class="form-control" name= "firstname" id="firstname" value="<?php echo $row['firstname'];?>" required="">
                    </div>
                    <div class="form-group col-md-5 ">
                        <label for="inputPassword4">Last Name</label>
                        <input type="text" class="form-control" name= "lastname" id="lastname" value="<?php echo $row['lastname'];?>" required="">
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Middle Initial</label>
                        <input type="text" class="form-control" name= "mi" id="mi" value="<?php echo $row['middlename'];?>"required="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" value="<?php echo $row['age'];?>"id="age" >
                    </div>
                    <div class="form-group col-md-4 ml-2">
                        <label>Religion</label>
                        <input type="text" class="form-control" name= "religion" value="<?php echo $row['religion'];?>"id="religion"  >
                    </div>
                    <div class="form-group col-md-5">
                        <label>Nationality</label>
                        <input type="text" class="form-control" name= "nationality" value="<?php echo $row['nationality'];?>" id="nationality" >
                    </div>
                </div>

                <div class="form">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name= "address" value="<?php echo $row['address'];?>" id="address" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col">
                        <label class=" form-control-label" for="gender">Gender</label>
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Male" <?php echo $row['gender'] == 'Male'? 'checked' : ''; ?>>Male
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Female" <?php echo $row['gender'] == 'Female'? 'checked' : ''; ?>>Female
                    </div>  
                   </div>   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date of Incident</label>
                            <input type="date" class="form-control" name= "date_i"  value="<?php echo $row['date_i'];?>"id="date_i">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Time of Incident</label>
                            <input type="text" class="form-control" name= "time_i" id="time_i" value="<?php echo $row['time_i'];?>" placeholder="HH/MM/AA">
                        </div>
                </div>
                <div class="form">
                        <div class="form-group">
                            <label>General Impression</label>
                            <input type="text" class="form-control" name= "impression" value="<?php echo $row['impression'];?>"id="impression">
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Relation to Patient</label>
                            <input type="text" class="form-control" name= "r_p1"value="<?php echo $row['r_p1'];?>" id="contact1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contact Number</label>
                            <input type="text" class="form-control" name= "contact1"value="<?php echo $row['contact1'];?>" id="contact1">
                        </div>
                </div>
                 <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Relation to Patient</label>
                            <input type="text" class="form-control" name= "r_p2" value="<?php echo $row['r_p2'];?>"id="r_p2" require>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contact Number</label>
                            <input type="text" class="form-control" name= "contact2"value="<?php echo $row['contact2'];?>" id="contact2" require>
                        </div>
                </div>
                <div class="form">
                        <div class="form-group">
                            <label>Reason For Calling</label>
                            <input type="text" class="form-control" name= "reason" value="<?php echo $row['reason'];?>" id="reason" require>
                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Nature of Incident</label>
                                <select name="nature" id="nature" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Medical" <?php echo $row['nature'] == 'Medical'? 'selected' : ''; ?>>Medical</option>
                                    <option value="Trauma" <?php echo $row['nature'] == 'Trauma'? 'selected' : ''; ?>>Trauma</option>
                                    <option value="Fire Response" <?php echo $row['nature'] == '>Fire Response'? 'selected' : ''; ?>>Fire Response</option>
                                    <option value="V A"  <?php echo $row['nature'] == '>V A<'? 'selected' : ''; ?>>V A</option>
                                    <option value="Activity Event"  <?php echo $row['nature'] == '>Activity Event'? 'selected' : ''; ?>>Activity Event</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Neuro</label>
                                <select name="neuro" id="neuro" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Alert" <?php echo $row['neuro'] == 'Alert'? 'selected' : ''; ?>>Alert</option>
                                    <option value="Oriented" <?php echo $row['neuro'] == 'Oriented'? 'selected' : ''; ?>>Oriented</option>
                                    <option value="Confused" <?php echo $row['neuro'] == 'Confused'? 'selected' : ''; ?>>Confused</option>
                                    <option value="Unresponsive" <?php echo $row['neuro'] == 'Unresponsive'? 'selected' : ''; ?>> Unresponsive</option>
                                </select>
                        </div>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-4">
                                <label>Call Recieve</label>
                                <input type="text" class="form-control" name= "call_recieve" value="<?php echo $row['call_recieve'];?>"  id="call_recieve">
                        </div>
                        <div class="form-group col-md-4">
                                <label for="inputPassword4">Unit Enroute</label>
                                <input type="text" class="form-control" name= "unit_enroute" value="<?php echo $row['unit_enroute'];?>" id="unit_enroute">
                        </div>
                        <div class="form-group col-md-4">
                                <label for="inputPassword4">Arrive at Scene</label>
                                <input type="text" class="form-control" name= "arrive_scene" value="<?php echo $row['arrive_scene'];?>" id="arrive_scene">
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-4">
                             <label for="inputPassword4">Time Left Scene</label>
                            <input type="text" class="form-control" name= "left_scene" id="left_scene" value="<?php echo $row['left_scene'];?>" placeholder="" require">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Arrive at Destination</label>
                                                <input type="text" class="form-control" name= "arrive_destination" value="<?php echo $row['arrive_destination'];?>"id="arrive_destination"  placeholder="" require">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Back In Service</label>
                            <input type="text" class="form-control" name= "back_service" value="<?php echo $row['back_service'];?>"id="back_service"  placeholder="" require">
                                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Airway</label>
                                <select name="airway" id="airway" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Patent" <?php echo $row['airway'] == 'Patent'? 'selected' : ''; ?>>Patent</option>
                                    <option value="Impaired"  <?php echo $row['airway'] == 'Impaired'? 'selected' : ''; ?>>Impaired</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Breathing</label>
                                <select name="breathing" id="breathing" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Unlabored" <?php echo $row['breathing'] == 'Unlabored'? 'selected' : ''; ?>>Unlabored</option>
                                    <option value="Deep" <?php echo $row['breathing'] == 'Deep'? 'selected' : ''; ?>>Deep</option>
                                    <option value="Shallow" <?php echo $row['breathing'] == 'Shallow'? 'selected' : ''; ?>>Shallow</option>
                                    <option value="Labored" <?php echo $row['breathing'] == 'Labored'? 'selected' : ''; ?>>Labored</option>
                                    <option value="Retraction" <?php echo $row['breathing'] == 'Retraction'? 'selected' : ''; ?>>Retraction</option>
                                    <option value="Absent" <?php echo $row['breathing'] == 'Absent'? 'selected' : ''; ?>>Absent</option>
                                </select>
                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Pupils</label>
                                <select name="pupils" id="pupils" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Normal/Pearl" <?php echo $row['pupils'] == 'Normal/Pearl'? 'selected' : ''; ?>>Normal/Pearl</option>
                                    <option value="Constritec(Left/Right)" <?php echo $row['pupils'] == 'Constritec(Left/Right)'? 'selected' : ''; ?>>Constritec(Left/Right)</option>
                                    <option value="Dilated(Left/Right)" <?php echo $row['pupils'] == 'Dilated(Left/Right)'? 'selected' : ''; ?>>Dilated(Left/Right)</option>
                                        <option value="No Reaction(Left/Right)" <?php echo $row['pupils'] == 'No Reaction(Left/Right)'? 'selected' : ''; ?>>No Reaction(Left/Right)</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Pulse</label>
                                <select name="pulse" id="pulse" class="form-control-lg form-control">
                                    <option value=""> </option>
                                    <option value="Normal" <?php echo $row['pulse'] == 'Normal'? 'selected' : ''; ?>>Normal</option>
                                    <option value="Strong" <?php echo $row['pulse'] == 'Strong'? 'selected' : ''; ?>>Strong</option>
                                    <option value="Weak" <?php echo $row['pulse'] == 'Weak'? 'selected' : ''; ?>>Weak</option>
                                    <option value="Irregular" <?php echo $row['pulse'] == 'Irregular'? 'selected' : ''; ?>>Irregular</option>
                                    <option value="Regular" <?php echo $row['pulse'] == 'Regular'? 'selected' : ''; ?>>Regular</option>
                                </select>
                        </div>
                 </div>

                <div class="row form-group">
                        <div class="col col-md-4">
                            <label for="select" class=" form-control-label">Skin</label>
                                <select name="skin" id="skin" class="form-control-lg form-control">
                                    <option value=""> </option>
                                    <option value="Normal"<?php echo $row['skin'] == 'Normal'? 'selected' : ''; ?>>Normal</option>
                                    <option value="Cyanotic"<?php echo $row['skin'] == 'Cyanotic'? 'selected' : ''; ?>>Cyanotic</option>
                                    <option value="Pale"<?php echo $row['skin'] == 'Pale'? 'selected' : ''; ?>>Pale</option>
                                    <option value="Cold"<?php echo $row['skin'] == 'Cold'? 'selected' : ''; ?>>Cold</option>
                                    <option value="Jaundice"<?php echo $row['skin'] == 'Jaundice'? 'selected' : ''; ?>>Jaundice</option>
                                    <option value="Flushed"<?php echo $row['skin'] == 'Flushed'? 'selected' : ''; ?>>Flushed</option>
                                    <option value="Asthen"<?php echo $row['skin'] == 'Asthen'? 'selected' : ''; ?>>Asthen</option>
                                </select>
                        </div>
                        <div class="col col-md-4">
                            <label for="select" class=" form-control-label">Skin Type</label>
                                <select name="skin_texture" id="skin_texture" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Normal" <?php echo $row['skin_texture'] == 'Normal'? 'selected' : ''; ?>>Normal</option>
                                    <option value="Moist" <?php echo $row['skin_texture'] == 'Moist'? 'selected' : ''; ?>>Moist</option>
                                    <option value="Dry" <?php echo $row['skin_texture'] == 'Dry'? 'selected' : ''; ?>>Dry</option>
                                    <option value="Disphoretic" <?php echo $row['skin_texture'] == 'Disphoretic'? 'selected' : ''; ?>>Disphoretic</option>
                                </select>
                        </div>
                        <div class="col col-md-4">
                            <label for="select" class=" form-control-label">CRT</label>
                                <select name="crt" id="crt" class="form-control-lg form-control">
                                    <option value=""> </option>
                                    <option value="Prolonged(>2 seconds)"  <?php echo $row['crt'] == 'Prolonged(>2 seconds)'? 'selected' : ''; ?>>Prolonged(>2 seconds)</option>
                                    <option value="Prolonged(>2 seconds)" <?php echo $row['crt'] == 'Prolonged(>2 seconds)'? 'selected' : ''; ?>>Normal(< 2 seconds)</option>
                                </select>
                        </div>
                </div>     
                </div>

<?php
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		
	});
	</script>

<?php
 include 'include/db.php';
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Patient Care Report Form</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        
        <!-- HEADER MOBILE-->
        <?php include 'header-mobile.php'; ?>
        <!-- END HEADER MOBILE-->
        
        <!-- MENU SIDEBAR-->
        <?php include 'menu-sidebar.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
        <!--END OF PAGE CONTAINER-->

        <!-- HEADER DESKTOP-->
        <?php include 'header-php.php' ?>
        <!-- END OF HEADER DESKTOP-->



<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">


    <!--================================================================================================================-->

<form action="include/pcrformdb.php" method="POST">
    <div class="col">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 align="center">Pre Hospital Patient Care Form</h1>
            </div>
                 <div class="card-body">
                    <div class="card-title">
                         <h4 class="ml-2 p-2">Patient's Personal Information</h4>
                    </div>
                    <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                         <?php endif ?>
                    <hr>
                    <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>First Name</label>
                                <input type="text" class="form-control" name= "firstname" id="firstname" required="">
                            </div>
                            <div class="form-group col-md-5 ">
                                <label for="inputPassword4">Last Name</label>
                                <input type="text" class="form-control" name= "lastname" id="lastname" required="">
                            </div>
                            <div class="form-group col-md-2 ">
                                <label>Middle Initial</label>
                                <input type="text" class="form-control" name= "mi" id="mi" required="">
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-1">
                                <label>Age</label>
                                <input type="text" class="form-control" name= "age" id="age" required="">
                            </div>
                            <div class="form-group col-md-4 ml-2">
                                 <label>Religion</label>
                                 <input type="text" class="form-control" name= "religion" id="religion" required="" >
                            </div>
                            <div class="form-group col-md-5">
                                 <label>Nationality</label>
                                 <input type="text" class="form-control" name= "nationality" id="nationality" required="">
                            </div>
                     </div>
                    <div class="form">
                            <div class="form-group">
                                 <label>Address</label>
                                 <input type="text" class="form-control" name= "address" id="address" required="">
                            </div>
                    </div>
                    <div class="row form-group">
                                <div class="col">
                                    <label class=" form-control-label" for="gender">Gender</label>
                                    <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Male" required="">Male
                                    <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Female">Female
                                </div>          
                    </div>
                    <button type="button" id="show_incident-form" class="btn btn-info"> Incident Info</button>
                     <button type="button" id="show_vs-form" class="btn btn-info">Patient's Vital Sign</button>
                     <button type="button" id="show_assesment" class="btn btn-info">Assesment</button>
                     <button type="button" id="show_teaminfo" class="btn btn-info">Rescuer Information</button>
            </div>  <!--end of card-body-->
        </div><!--end of card-->
    </div><!--end of col-->

     <div class="col">
        <div class="card" id="incident_form">
                 <div class="card-body">
                    <div class="card-title">
                         <h4 class="ml-2 p-2">Incident Information</h4>
                    </div>
                    <hr>
                     <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label>Date of Incident</label>
                                            <input type="date" class="form-control" name= "date_i" id="date_i" require">
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label for="inputPassword4">Time of Incident</label>
                                            <input type="text" class="form-control" name= "time_i" id="time_i"  placeholder="HH/MM/AA" require">
                                    </div>
                                 </div>
                                 <div class="form">
                                    <div class="form-group">
                                            <label>General Impression</label>
                                            <input type="text" class="form-control" name= "impression" id="impression" require">
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label>Relation to Patient</label>
                                            <input type="text" class="form-control" name= "r_p1" id="contact1" require">
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label for="inputPassword4">Contact Number</label>
                                            <input type="text" class="form-control" name= "contact1" id="contact1" require">
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label>Relation to Patient</label>
                                            <input type="text" class="form-control" name= "r_p2" id="r_p2" require">
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label for="inputPassword4">Contact Number</label>
                                            <input type="text" class="form-control" name= "contact2" id="contact2" require">
                                    </div>
                                 </div>
                                 <div class="form">
                                    <div class="form-group">
                                            <label>Reason For Calling</label>
                                            <input type="text" class="form-control" name= "reason" id="reason" require">
                                    </div>
                                 </div>
                                 <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="select" class=" form-control-label">Nature of Incident</label>
                                                <select name="nature" id="nature" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Trauma">Trauma</option>
                                                    <option value="Fire Response">Fire Response</option>
                                                    <option value="V A">V A</option>
                                                    <option value="Activity Event">Activity Event</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-6">
                                            <label for="select" class=" form-control-label">Neuro</label>
                                                <select name="neuro" id="neuro" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Alert">Alert</option>
                                                    <option value="Oriented">Oriented</option>
                                                    <option value="Confused">Confused</option>
                                                    <option value="Unresponsive">Unresponsive</option>
                                                </select>
                                        </div>
                                    </div> 
                                    <br>
                                     <div class="form-row">
                                        <div class="form-group col-md-4">
                                                <label>Call Recieve</label>
                                                <input type="text" class="form-control" name= "call_recieve" id="call_recieve" require">
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Unit Enroute</label>
                                                <input type="text" class="form-control" name= "unit_enroute" id="unit_enroute"  placeholder="HH/MM/AA" require">
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Arrive at Scene</label>
                                                <input type="text" class="form-control" name= "arrive_scene" id="arrive_scene"  placeholder="HH/MM/AA" require">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Time Left Scene</label>
                                                <input type="text" class="form-control" name= "left_scene" id="left_scene"  placeholder="HH/MM/AA" require">
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Arrive at Destination</label>
                                                <input type="text" class="form-control" name= "arrive_destination" id="arrive_destination"  placeholder="HH/MM/AA" require">
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Back In Service</label>
                                                <input type="text" class="form-control" name= "back_service" id="back_service"  placeholder="HH/MM/AA" require">
                                        </div>
                                 </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Airway</label>
                                                <select name="airway" id="airway" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Patent">Patent</option>
                                                    <option value="Impaired">Impaired</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Breathing</label>
                                                <select name="breathing" id="breathing" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Unlabored">Unlabored</option>
                                                    <option value="Deep">Deep</option>
                                                    <option value="Shallow">Shallow</option>
                                                    <option value="Labored">Labored</option>
                                                    <option value="Retraction">Retraction</option>
                                                    <option value="Absent">Absent</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Pupils</label>
                                                <select name="pupils" id="pupils" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Normal/Pearl">Normal/Pearl</option>
                                                    <option value="Constritec(Left/Right)">Constritec(Left/Right)</option>
                                                    <option value="Dilated(Left/Right)">Dilated(Left/Right)</option>
                                                    <option value="No Reaction(Left/Right)">No Reaction(Left/Right)</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Pulse</label>
                                                <select name="pulse" id="pulse" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Strong">Strong</option>
                                                    <option value="Weak">Weak</option>
                                                    <option value="Irregular">Irregular</option>
                                                     <option value="Regular">Regular</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Skin</label>
                                                <select name="skin" id="skin" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Cyanotic">Cyanotic</option>
                                                    <option value="Pale">Pale</option>
                                                    <option value="Cold">Cold</option>
                                                    <option value="Jaundice">Jaundice</option>
                                                    <option value="Flushed">Flushed</option>
                                                    <option value="Asthen">Asthen</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Skin Type</label>
                                                <select name="skin_texture" id="skin_texture" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Moist">Moist</option>
                                                    <option value="Dry">Dry</option>
                                                    <option value="Disphoretic">Disphoretic</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">CRT</label>
                                                <select name="crt" id="crt" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="1">Prolonged(>2 seconds)</option>
                                                    <option value="2">Normal(< 2 seconds)</option>
                                                </select>
                                        </div>
                                    </div> 
                 </div>  <!--end of card-body-->
        </div><!--end of card-->
    </div><!--end of col-->

     <div class="col">
        <div class="card" id="vital_signs">
                 <div class="card-body">
                    <div class="card-title">
                         <h4 class="ml-2 p-2">Patients Vital Signs Info</h4>
                    </div>
                    <hr>
                     <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label>Time</label>
                                                <input type="text" class="form-control" name= "time_vs" id="time_vs">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="inputPassword4">Blood Pressure</label>
                                                <input type="text" class="form-control" name= "bp" id="bp">
                                        </div>
                                 </div>
                                 <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label>Pulse Rate</label>
                                                <input type="text" class="form-control" name= "pr" id="pr" >
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label for="inputPassword4">Risk ratio</label>
                                                <input type="text" class="form-control" name= "rr" id="rr" ">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label>Temperature</label>
                                                <input type="text" class="form-control" name= "temp" id="temp">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label for="inputPassword4">02 Stat</label>
                                                <input type="text" class="form-control" name= "stat" id="stat">
                                        </div>
                                 </div>
                                  <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Eye</label>
                                                <select name="eye" id="eye" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Verbal</label>
                                                <select name="verbal" id="verbal" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Motor</label>
                                                <select name="motor" id="motor" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="6">6</option>
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                                <label>Total</label>
                                                <input type="text" class="form-control" name= "total" id="total" require">
                                        </div>
                                 </div>

            </div>  <!--end of card-body-->
        </div><!--end of card-->
    </div><!--end of col-->
    <div class="col">
        <div class="card" id="assesment">
                 <div class="card-body">
                    <div class="card-title">
                         <h4 class="ml-2 p-2">Assesment</h4>
                    </div>
                    <hr>
                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Signs and Symptoms</label>
                                        <input type="text" class="form-control" name="symtomps" id="symtomps">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Allergies</label>
                                        <input type="text" class="form-control" name="allergies" id="allergies">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Meds</label>
                                        <input type="text" class="form-control" name="meds" id="meds">
                                    </div>
                                 </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Past Illness</label>
                                        <input type="text" class="form-control" name="past_ill" id="past_ill">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Last Oral Intake</label>
                                        <input type="text" class="form-control" name="oral_intake" id="oral_intake">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Time of Intake</label>
                                        <input type="text" class="form-control" name="time_oral" id="time_oral">
                                    </div>
                                 </div>
                                 <div class="form">
                                    <div class="form-group">
                                        <label>Events Prior</label>
                                        <input type="text" class="form-control" name="events_prior" id="events_prior">
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Onset</label>
                                        <input type="text" class="form-control" name="onset" id="onset">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Provocation</label>
                                        <input type="text" class="form-control" name="provocation" id="provocation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Quality</label>
                                        <input type="text" class="form-control" name="quality" id="quality">
                                    </div>
                                 </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Radiation</label>
                                        <input type="text" class="form-control" name="radiation" id="radiation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Severity</label>
                                        <input type="text" class="form-control" name="severity" id="severity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Timing</label>
                                        <input type="text" class="form-control" name="timing_i" id="timing_i">
                                    </div>
                                 </div>
                                 <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Trauma Case</label>
                                                <select name="trauma" id="etraumaye" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Alcohol Intoxication">Alcohol Intoxication</option>
                                                    <option value="Animal Bite">Animal Bite</option>
                                                    <option value="Drowning">Drowning</option>
                                                    <option value="Electrocution">Electrocution</option>
                                                    <option value="Fall">Fall</option>
                                                    <option value="Gunshot Wound">Gunshot Wound</option>
                                                    <option value="Hit and run">Hit and run</option>
                                                    <option value="Mauling">Mauling</option>
                                                    <option value="Stab Wound">Stab Wound</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Burn(%TBSA)</label>
                                                <select name="burn" id="burn" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="First Degree">First Degree</option>
                                                    <option value="Second Degree">Second Degree</option>
                                                    <option value="Superficial">Superficial</option>
                                                    <option value="Deep">Deep</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Treatment</label>
                                                <select name="treatment" id="treatment" class="form-control-lg form-control">
                                                    <option value="null">Please select</option>
                                                    <option value="Airway Conduct">Airway Conduct</option>
                                                    <option value="Abdominal Thrus">Abdominal Thrust</option>
                                                    <option value="Bandaging">Bandaging</option>
                                                    <option value="Burn Care">Burn Care</option>
                                                    <option value="Cold Application">Cold Application</option>
                                                    <option value="Defibrillation">Defibrillation</option>
                                                    <option value="Extrication">Extrication</option>
                                                    <option value="Rescue Breathing">Rescue Breathing</option>
                                                    <option value="Nebulization">Nebulization</option>
                                                    <option value="Oxygen">Oxygen</option>
                                                    <option value="Spine Immobilization">Spine Immobilization</option>
                                                    <option value="Suctioning">Suctioning</option>
                                                    <option value="Spliting/Traction">Spliting/Traction</option>
                                                    <option value="VS Checked">VS Checked</option>
                                                    <option value="Wound Cleaning/Dressing">Wound Cleaning/Dressing</option>
                                                    <option value="CPR">CPR</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form">
                                        <div class="form-group">
                                            <label>Narratives</label>
                                              <textarea name="narrative" id="narrative" rows="9" placeholder="Write Narratives.." class="form-control"></textarea>
                                    </div>
                                </div>
  </div>  <!--end of card-body-->
        </div><!--end of card-->
    </div><!--end of col-->

    <div class="col">
        <div class="card" id="team_info">
                 <div class="card-body">
                    <div class="card-title">
                         <h4 class="ml-2 p-2">Team Information</h4>
                    </div>
                    <hr>
                    <div class="row form-group">
                                     <div class="col col-md-4">
                                        <label>Dispatched Unit</label>
                                         <select name="dispatched_unit" class="form-control-lg form-control">
                                            <option value="null">Select</option>
                                        <?php
                                            $query = "SELECT * FROM unit_name";
                                            $result = mysqli_query($conn,$query);
                                            while($row=mysqli_fetch_assoc($result)){
                                                ?>
                                            <option value="<?php echo $row['unit_name'];?>"><?php echo $row['unit_name'];?></option>
                                       <?php } ?>
                                            </select>
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Treatment Officer</label>
                                        <input type="text" class="form-control" name="treatment_officer" id="treatment_officer">
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Trasnport Officer</label>
                                        <input type="text" class="form-control" name="transport_officer" id="transport_officer">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label>Destination Determination</label>
                                        <select name="desti_deter" class="form-control-lg form-control">
                                            <option value="Closest Facility">Closest Facility</option>
                                            <option value="Patient's Choice">Patient's Choice</option>
                                            <option value="Family's Choice">Family's Choice</option>
                                            <option value="Medical Direction">Medical Direction</option>
                                            <option value="Law Enforcement Choice">Law Enforcement Choice</option>
                                            <option value="Protocol">Protocol</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Responsode mode</label>
                                        <select name="response_mode" class="form-control-lg form-control">
                                            <option value="No Lights and Siren">No Lights and Siren</option>
                                            <option value="Lights Only">Lights Only</option>
                                            <option value="Lights and Siren">Lights and Siren</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Transport Mode</label>
                                        <select name="transport_mode" class="form-control-lg form-control">
                                            <option value="No Lights and Siren">No Lights and Siren</option>
                                            <option value="Lights Only">Lights Only"</option>
                                            <option value="Lights and Siren">Lights and Siren</option>
                                            <option value="Upgraded to Light and Siren">Upgraded to Light and Siren</option>
                                        </select>
                                </div>
                            </div>
                                <br>
                                <h4>Endorsement</h4>
                                <hr>
                                <div class="form">
                                    <div class="col">
                                        <label>Receiving Facility</label>
                                        <input type="text" class="form-control" name="receiving_facility" id="receiving_facility">
                                    </div>
                                    <div class="col">
                                        <label>Receiving MD/RN/Relative</label>
                                        <input type="text" class="form-control" name="receiving_md" id="receiving_md">
                                    </div>
                                </div>
             </div>  <!--end of card-body-->
        </div><!--end of card-->
    </div><!--end of col-->

    <div class="col">
        <div class="card" style="margin-top:-36px;">
            <div class="card-body">
            <input type="submit" name="upload" id="upload" style= "" class="btn btn-primary btn-lg btn-block" value="Upload Data">
                 </div>  <!--end of card-body-->
        </div><!--end of card-->
    </div><!--end of col-->
</form>







                <!-- END OF MAIN DIVS-->
          </div><!-- end of container-fluid -->
    </div><!-- end of section -->
</div><!-- end of main-content -->
                    <?php include 'footer.php'; ?>

                    

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function(){
            $('#incident_form').hide();
            $('#show_incident-form').on('click',function(){
                $('#incident_form').toggle(function(){      
                });
            });
        });


        $(document).ready(function(){
            $('#vital_signs').hide();
            $('#show_vs-form').on('click',function(){
                $('#vital_signs').toggle(function(){
                });
            });
        });


        $(document).ready(function(){
            $('#assesment').hide();
            $('#show_assesment').on('click',function(){
                $('#assesment').toggle(function(){
                });
            });
        });


         $(document).ready(function(){
            $('#team_info').hide();
            $('#show_teaminfo').on('click',function(){
                $('#team_info').toggle(function(){
                });
            });
        });


    </script>


</body>

</html>
<!-- end document-->
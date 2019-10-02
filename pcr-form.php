
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
        <?php include 'rescuer_sidebar.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
        <!--END OF PAGE CONTAINER-->

        <!-- HEADER DESKTOP-->
        <?php include 'rescuer_header.php' ?>
        <!-- END OF HEADER DESKTOP-->



<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
  <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?> mt-2">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                         <?php endif ?>

    <!--================================================================================================================-->

<form action="include/pcrformdb.php" method="POST">
    <?php
                if(isset($_SESSION['confirm_username'])){
                    $username = $_SESSION['confirm_username'];
                    $info = "SELECT * FROM rescuers WHERE username = '$username' ";
                    $query = $conn->query($info);
                    $fetch = mysqli_fetch_assoc($query);
                    $name = $fetch['firstname']." ".$fetch['lastname'];
                }
            ?>     
            <input type="hidden" name="sender" value="<?php echo $name;?>">
            <input type="hidden" name="team" value="<?php echo $fetch['team_unit']; ?>">
            

           
    <div class="col">
        <div class="card">
            <div class="card-header bg-light">
                <h3 align="center" class="p-4">Pre Hospital Patient Care Form</h3>
            </div>
                 <div class="card-body">

         <!--================================================================================================================-->

                    <ul class="nav nav-tabs nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" style="border:1px solid #ccc" id="list_patient">
                                Patient's Personal Info
                            </a>    
                        </li>
                         <li class="nav-item">
                            <a class="nav-link inactive_tab1" href="#" style="border:1px solid #ccc" id="list_incident">
                                Incident Info
                            </a>    
                        </li>
                         <li class="nav-item">
                            <a class="nav-link inactive_tab1" href="#" style="border:1px solid #ccc" id="list_vs">
                                 Vital Sign
                            </a>    
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inactive_tab1 "  href="#" style="border:1px solid #ccc" id="list_assesment">
                                 Assesment
                            </a>    
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inactive_tab1" href="#" style="border:1px solid #ccc" id="list_rescuer">
                                 Rescuer Information
                            </a>    
                        </li>
                    </ul>

     <!--====================================Patient's Personal Info=================================================-->
<div class="tab-content" style="margin-top:16px;">
    <div class="tab-pane active" id="personalinfo_content">
        <div class="panel panel-default">
            <div class="panel-heading">Patient's Personal Info</div>

            <div class="panel-body">
                <input type="hidden" class="form-control" name="status" id="status" value="unread" readonly>
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
                        <input type="text" class="form-control" name= "age" id="age" >
                    </div>
                    <div class="form-group col-md-4 ml-2">
                        <label>Religion</label>
                        <input type="text" class="form-control" name= "religion" id="religion"  >
                    </div>
                    <div class="form-group col-md-5">
                        <label>Nationality</label>
                        <input type="text" class="form-control" name= "nationality" id="nationality" >
                    </div>
                </div>

                <div class="form">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name= "address" id="address" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col">
                        <label class=" form-control-label" for="gender">Gender</label>
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Male">Male
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Female">Female
                    </div>          
                </div>
                    <div align="center">
                        <button type="button" name="btn_personal_info" id="btn_personal_info" class="btn btn-info btn">
                            Next
                        </button>
                    </div>
            </div>
            
        </div>
    </div>
     <!--====================================End Patient's Personal Info=================================================-->

     <!--====================================Incident Details=================================================-->
<div class="tab-pane fade" id="incident_details">
    <div class="panel panel-default">
        <div class="panel-heading">Incident Info</div>
            <div class="panel-body">

                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date of Incident</label>
                            <input type="date" class="form-control" name= "date_i" id="date_i">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Time of Incident</label>
                            <input type="text" class="form-control" name= "time_i" id="time_i"  placeholder="HH/MM/AA">
                        </div>
                </div>
                <div class="form">
                        <div class="form-group">
                            <label>General Impression</label>
                            <input type="text" class="form-control" name= "impression" id="impression">
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Relation to Patient</label>
                            <input type="text" class="form-control" name= "r_p1" id="contact1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contact Number</label>
                            <input type="text" class="form-control" name= "contact1" id="contact1">
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
                                    <option value=""></option>
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
                                    <option value=""></option>
                                    <option value="Alert">Alert</option>
                                    <option value="Oriented">Oriented</option>
                                    <option value="Confused">Confused</option>
                                    <option value="Unresponsive">Unresponsive</option>
                                </select>
                        </div>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-4">
                                <label>Call Recieve</label>
                                <input type="text" class="form-control" name= "call_recieve" id="call_recieve">
                        </div>
                        <div class="form-group col-md-4">
                                <label for="inputPassword4">Unit Enroute</label>
                                <input type="text" class="form-control" name= "unit_enroute" id="unit_enroute">
                        </div>
                        <div class="form-group col-md-4">
                                <label for="inputPassword4">Arrive at Scene</label>
                                <input type="text" class="form-control" name= "arrive_scene" id="arrive_scene">
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Time Left Scene</label>
                                                <input type="text" class="form-control" name= "left_scene" id="left_scene"  placeholder="" require">
                        </div>
                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Arrive at Destination</label>
                                                <input type="text" class="form-control" name= "arrive_destination" id="arrive_destination"  placeholder="" require">
                        </div>
                        <div class="form-group col-md-4">
                                                <label for="inputPassword4">Back In Service</label>
                                                <input type="text" class="form-control" name= "back_service" id="back_service"  placeholder="" require">
                                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Airway</label>
                                <select name="airway" id="airway" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Patent">Patent</option>
                                    <option value="Impaired">Impaired</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Breathing</label>
                                <select name="breathing" id="breathing" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Unlabored">Unlabored</option>
                                    <option value="Deep">Deep</option>
                                    <option value="Shallow">Shallow</option>
                                    <option value="Labored">Labored</option>
                                    <option value="Retraction">Retraction</option>
                                    <option value="Absent">Absent</option>
                                </select>
                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Pupils</label>
                                <select name="pupils" id="pupils" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Normal/Pearl">Normal/Pearl</option>
                                    <option value="Constritec(Left/Right)">Constritec(Left/Right)</option>
                                    <option value="Dilated(Left/Right)">Dilated(Left/Right)</option>
                                        <option value="No Reaction(Left/Right)">No Reaction(Left/Right)</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Pulse</label>
                                <select name="pulse" id="pulse" class="form-control-lg form-control">
                                    <option value=""> </option>
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
                                    <option value=""> </option>
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
                                    <option value=""></option>
                                    <option value="Normal">Normal</option>
                                    <option value="Moist">Moist</option>
                                    <option value="Dry">Dry</option>
                                    <option value="Disphoretic">Disphoretic</option>
                                </select>
                        </div>
                        <div class="col col-md-4">
                            <label for="select" class=" form-control-label">CRT</label>
                                <select name="crt" id="crt" class="form-control-lg form-control">
                                    <option value=""> </option>
                                    <option value="Prolonged(>2 seconds)">Prolonged(>2 seconds)</option>
                                    <option value="Normal(< 2 seconds)">Normal(< 2 seconds)</option>
                                </select>
                        </div>
                </div>
                <div align="center">
                    <button type="button" name="btn_personal_info" id="btn_prev_incident" class="btn btn-secondary btn">
                            Previous
                        </button>
                        <button type="button" name="btn_personal_info" id="btn_nxt_incident" class="btn btn-info btn">
                            Next
                        </button>
                    </div> 
                                   
        </div>
    </div>
</div>

     <!--====================================End ofIncident Details=================================================-->


    
 <!--====================================Vital Signs=================================================-->
<div class="tab-pane fade" id="vsinfo_content">
    <div class="panel panel-default">
        <div class="panel-heading">Vital Signs Info</div>

            <div class="panel-body">
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
                                                <select name="eye" id="eye" class="form-control-lg form-control sum-selector">
                                                    <option value=""> </option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Verbal</label>
                                                <select name="verbal" id="verbal" class="form-control-lg form-control sum-selector">
                                                    <option value=""> </option>
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Motor</label>
                                                <select name="motor" id="motor" class="form-control-lg form-control sum-selector">
                                                    <option value=""> </option>
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
                                        <div class="input-group">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default btn-primary" id="total" type="button">Total</button>
                                              </span>
                                              <input type="text" class="form-control col-md-3 ml-2" name="total" id="total_input" readonly="">
                                            </div>
                                 </div>
                <div align="center">
                    <button type="button" name="btn_personal_info" id="btn_prev_vs" class="btn btn-secondary btn">
                            Previous
                    </button>
                    <button type="button" name="btn_personal_info" id="btn_next_vs" class="btn btn-info btn">
                            Next
                    </button>
                </div> 


        </div>
    </div>
</div>


    <!--====================================End ofVital Signs=================================================-->

 <!--====================================Rescuer Info=================================================-->
<div class="tab-pane fade" id="assesment_content">
    <div class="panel panel-default">
        <div class="panel-heading">Assesment</div>

            <div class="panel-body">
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
                                                    <option value=""></option>
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
                                                    <option value=""></option>
                                                    <option value="First Degree">First Degree</option>
                                                    <option value="Second Degree">Second Degree</option>
                                                    <option value="Superficial">Superficial</option>
                                                    <option value="Deep">Deep</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Treatment</label>
                                                <select name="treatment" id="treatment" class="form-control-lg form-control">
                                                    <option value=""></option>
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
                                 <div align="center">
                    <button type="button" name="btn_personal_info" id="btn_prev_assesment" class="btn btn-secondary btn">
                            Previous
                    </button>
                    <button type="button" name="btn_personal_info" id="btn_nxt_assesment" class="btn btn-info btn">
                            Next
                    </button>
                </div> 
            </div>
    </div>
</div>
            <!--====================================End of Assesment=================================================-->
    <!--====================================Rescuer Info=================================================-->
<div class=" tab-pane fade" id="rescuer_content">
    <div class="panel panel-default">
        <div class="panel-heading">Team Rescuer Information</div>

            <div class="panel-body">
                <div class="row form-group">
                                     <div class="col col-md-3">
                                        <label>Dispatched Unit</label>
                                         <select name="" id="teams" class="form-control-lg form-control">
                                            <option value=""></option>
                                        <?php
                                            $query = "SELECT * FROM unit_name";
                                            $result = mysqli_query($conn,$query);
                                            while($row=mysqli_fetch_assoc($result)){
                                                ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['unit_name'];?></option>
                                       <?php } ?>
                                            </select>
                                    </div>
                                     <div class="col col-md-3">
                                        <label>Team</label>
                                        <input type="text" class="form-control" name="dispatched_unit" id="dispatched_unit" readonly="">
                                    </div>
                                    <div class="col col-md-3">
                                        <label>Treatment Officer</label>
                                        <input type="text" class="form-control" name="treatment_officer" id="treatment_officer" readonly="">
                                    </div>
                                    <div class="col col-md-3">
                                        <label>Trasnport Officer</label>
                                        <input type="text" class="form-control" name="transport_officer" id="transport_officer" readonly="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label>Destination Determination</label>
                                        <select name="desti_deter" class="form-control-lg form-control">
                                            <option value=""></option>
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
                                            <option value=""></option>
                                            <option value="No Lights and Siren">No Lights and Siren</option>
                                            <option value="Lights Only">Lights Only</option>
                                            <option value="Lights and Siren">Lights and Siren</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Transport Mode</label>
                                        <select name="transport_mode" class="form-control-lg form-control">
                                            <option value=""></option>
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
                                <br>
                <div align="center">
                        <button type="button" name="btn_personal_info" id="btn_prev_rescuer" class="btn btn-secondary btn">
                                    Previous
                        </button>
                        <button type="submit" name="upload" id="upload" class="btn btn-success btn">
                                    Save
                        </button>
                </div> 
            </div>


        </div>
    </div>

        <!--====================================End of Rescuer Info=================================================-->



     <!--====================================END OF CONTENTS=================================================-->
 </div>
</div>
        </div>
    </div>
</form>
    <!--================================================================================================================-->
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
            $('#btn_personal_info').click(function(){
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var mi = $('#mi').val();
                var age = $('#age').val();
                var religion = $('#religion').val();
                var nationality = $('#nationality').val();
                var address = $('#address').val();
                var gender = $('#gender').val();

                if(firstname == ''||lastname==''||mi==''||age==''||religion==''||nationality==''||address==''||gender==''){
                    alert("Please fill all fields!");
                }
                else{
                    $('#list_patient').removeClass('active');
                    $('#list_patient').removeClass('href data-toggle');
                    $('#personalinfo_content').removeClass('active');
                    $('#list_patient').addClass('inactive_tab');
                    $('#list_incident').removeClass('inactive_tab');
                    $('#list_incident').addClass('active');
                    $('#incident_details').attr('href','incident_details');
                    $('#list_incident').attr('data-toggle','tab');
                    $('#incident_details').addClass('active in');
                }

            });

            $('#btn_prev_incident').click(function(){
                $('#list_incident').removeClass('active');
                $('#list_incident').removeAttr('href','data-toggle');
                $('#list_patient').addClass('active');
                $('#list_patient').attr('href','personalinfo_content');
                $('#list_patient').attr('data-toggle','tab');
                $('#incident_details').removeClass('active in');
                $('#personalinfo_content').addClass('active in');
            });

            $('#btn_nxt_incident').click(function(){
                    $('#list_incident').removeClass('active');
                    $('#list_incident').removeClass('href data-toggle');
                    $('#incident_details').removeClass('active');
                    $('#list_incident').addClass('inactive_tab');
                    $('#list_vs').removeClass('inactive_tab');
                    $('#list_vs').addClass('active');
                    $('#vsinfo_content').attr('href','vsinfo_content');
                    $('#list_vs').attr('data-toggle','tab');
                    $('#vsinfo_content').addClass('active in');
            });

            $('#btn_prev_vs').click(function(){
                $('#list_vs').removeClass('active');
                $('#list_vs').removeAttr('href','data-toggle');
                $('#list_incident').addClass('active');
                $('#list_incident').attr('href','personalinfo_content');
                $('#list_incident').attr('data-toggle','tab');
                $('#vsinfo_content').removeClass('active in');
                $('#incident_details').addClass('active in');
            });

             $('#btn_next_vs').click(function(){
                    $('#list_vs').removeClass('active');
                    $('#list_vs').removeClass('href data-toggle');
                    $('#vsinfo_content').removeClass('active');
                    $('#list_vs').addClass('inactive_tab');
                    $('#list_assesment').removeClass('inactive_tab');
                    $('#list_assesment').addClass('active');
                    $('#assesment_content').attr('href','vsinfo_content');
                    $('#list_assesment').attr('data-toggle','tab');
                    $('#assesment_content').addClass('active in');
            });

            $('#btn_prev_assesment').click(function(){
                $('#list_assesment').removeClass('active');
                $('#list_assesment').removeAttr('href','data-toggle');
                $('#list_vs').addClass('active');
                $('#list_vs').attr('href','personalinfo_content');
                $('#list_vs').attr('data-toggle','tab');
                $('#assesment_content').removeClass('active in');
                $('#vsinfo_content').addClass('active in');
            });

              $('#btn_nxt_assesment').click(function(){
                    $('#list_assesment').removeClass('active');
                    $('#list_assesment').removeClass('href data-toggle');
                    $('#assesment_content').removeClass('active');
                    $('#list_rescuer').addClass('inactive_tab');
                    $('#list_rescuer').removeClass('inactive_tab');
                    $('#list_rescuer').addClass('active');
                    $('#rescuer_content').attr('href','rescuer_content');
                    $('#list_assesment').attr('data-toggle','tab');
                    $('#rescuer_content').addClass('active in');
            });

               $('#btn_prev_rescuer').click(function(){
                $('#list_rescuer').removeClass('active');
                $('#list_rescuer').removeAttr('href','data-toggle');
                $('#list_assesment').addClass('active');
                $('#list_assesment').attr('href','personalinfo_content');
                $('#list_assesment').attr('data-toggle','tab');
                $('#rescuer_content').removeClass('active in');
                $('#assesment_content').addClass('active in');
            });

               $('#total').click(function(){
                   var eye = parseInt($('#eye :selected').val());
                   var verbal = parseInt($('#verbal :selected').val());
                   var motor = parseInt($('#motor :selected').val());
                   
                   var total = eye + verbal + motor;
                   $('#total_input').val(total);
               });

               $('#teams').change(function(){
                    var id = $(this).val();
                   
                    $.ajax({
                        url: "team_info.php",
                        method: "post",
                        data:{id:id},
                        dataType:"JSON",    
                        success:function(data){
                            $('#dispatched_unit').val(data.unit_name);
                            $('#treatment_officer').val(data.treatment_officer);
                            $('#transport_officer').val(data.transport_officer);
                        }
                    });
               })

        });


    </script>


</body>

</html>
<!-- end document-->

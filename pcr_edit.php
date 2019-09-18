
<?php
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
    <title>Edit Patient Care Report Form</title>

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
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">di

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
    <?php
include 'include/db.php';
    if(isset($_GET['view'])){
        $id = $_GET['view'];

        $qry = "SELECT * FROM pcr WHERE id = '$id'";
        $result = mysqli_query($conn,$qry) or trigger_error(mysqli_error($conn)." ".$qry);
        while($row = mysqli_fetch_assoc($result)){?>

<form action="include/pcrformedit.php" method="POST">
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
  <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                         <?php endif ?>

     <!--====================================Patient's Personal Info=================================================-->
<div class="tab-content" style="margin-top:16px;">
    <div class="tab-pane active" id="personalinfo_content">
        <div class="panel panel-default">
            <div class="panel-heading">Patient's Personal Info</div>

            <div class="panel-body">
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
                            <input type="text" class="form-control" name= "time_vs" value="<?php echo $row['time_vs'];?>" id="time_vs">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Blood Pressure</label>
                         <input type="text" class="form-control" name= "bp" value="<?php echo $row['bp'];?>" id="bp">
                    </div>
                </div>
                                 <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label>Pulse Rate</label>
                                                <input type="text" class="form-control" name= "pr" value="<?php echo $row['pr'];?>"  id="pr" >
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label for="inputPassword4">Risk ratio</label>
                                                <input type="text" class="form-control" name= "rr" value="<?php echo $row['rr'];?>"  id="rr" ">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label>Temperature</label>
                                                <input type="text" class="form-control" name= "temp" value="<?php echo $row['temp'];?>" id="temp">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label for="inputPassword4">02 Stat</label>
                                                <input type="text" class="form-control" name= "stat" value="<?php echo $row['02stat'];?>" id="stat">
                                        </div>
                                 </div>
                                  <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Eye</label>
                                                <select name="eye" id="eye" class="form-control-lg form-control">
                                                    <option value=""> </option>
                                                    <option value="4" <?php echo $row['eye'] == '4'? 'selected': '';?>>4</option>
                                                    <option value="3" <?php echo $row['eye'] == '3'? 'selected': '';?>>3</option>
                                                    <option value="2" <?php echo $row['eye'] == '2'? 'selected': '';?>>2</option>
                                                    <option value="1" <?php echo $row['eye'] == '1'? 'selected': '';?>>1</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Verbal</label>
                                                <select name="verbal" id="verbal" class="form-control-lg form-control">
                                                    <option value=""> </option>
                                                    <option value="5" <?php echo $row['verbal'] == '5'? 'selected': '';?>>5</option>
                                                    <option value="4" <?php echo $row['verbal'] == '4'? 'selected': '';?>>4</option>
                                                    <option value="3" <?php echo $row['verbal'] == '3'? 'selected': '';?>>3</option>
                                                    <option value="2" <?php echo $row['verbal'] == '2'? 'selected': '';?>>2</option>
                                                    <option value="1" <?php echo $row['verbal'] == '1'? 'selected': '';?>>1</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Motor</label>
                                                <select name="motor" id="motor" class="form-control-lg form-control">
                                                    <option value=""> </option>
                                                    <option value="6" <?php echo $row['motor'] == '6'? 'selected': '';?>>6</option>
                                                    <<option value="5"<?php echo $row['motor'] == '5'? 'selected': '';?>>5</option>
                                                    <option value="4" <?php echo $row['motor'] == '4'? 'selected': '';?>>4</option>
                                                    <option value="3" <?php echo $row['motor'] == '3'? 'selected': '';?>>3</option>
                                                    <option value="2" <?php echo $row['motor'] == '2'? 'selected': '';?>>2</option>
                                                    <option value="1" <?php echo $row['motor'] == '1'? 'selected': '';?>>1</option>
                                                </select>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                                <label>Total</label>
                                                <input type="text" class="form-control" value="<?php echo $row['total'];?>" name= "total" id="total" require>
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
                                        <input type="text" class="form-control" value="<?php echo $row['symtomps'];?>" name="symtomps" id="symtomps">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Allergies</label>
                                        <input type="text" class="form-control"value="<?php echo $row['allergies'];?>" name="allergies" id="allergies">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Meds</label>
                                        <input type="text" class="form-control" value="<?php echo $row['meds'];?>" name="meds" id="meds">
                                    </div>
                                 </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Past Illness</label>
                                        <input type="text" class="form-control" value="<?php echo $row['past_ill'];?>" name="past_ill" id="past_ill">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Last Oral Intake</label>
                                        <input type="text" class="form-control" value="<?php echo $row['oral_intake'];?>" name="oral_intake" id="oral_intake">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Time of Intake</label>
                                        <input type="text" class="form-control" value="<?php echo $row['time_oral'];?>" name="time_oral" id="time_oral">
                                    </div>
                                 </div>
                                 <div class="form">
                                    <div class="form-group">
                                        <label>Events Prior</label>
                                        <input type="text" class="form-control" value="<?php echo $row['events_prior'];?>" name="events_prior" id="events_prior">
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Onset</label>
                                        <input type="text" class="form-control" value="<?php echo $row['onset'];?>" name="onset" id="onset">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Provocation</label>
                                        <input type="text" class="form-control" value="<?php echo $row['provocation'];?>" name="provocation" id="provocation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Quality</label>
                                        <input type="text" class="form-control" value="<?php echo $row['quality'];?>" name="quality" id="quality">
                                    </div>
                                 </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Radiation</label>
                                        <input type="text" class="form-control" value="<?php echo $row['radiation'];?>" name="radiation" id="radiation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Severity</label>
                                        <input type="text" class="form-control" value="<?php echo $row['severity'];?>" name="severity" id="severity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Timing</label>
                                        <input type="text" class="form-control" value="<?php echo $row['timing_i'];?>" name="timing_i" id="timing_i">
                                    </div>
                                 </div>
                                 <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Trauma Case</label>
                                                <select name="trauma" id="etraumaye" class="form-control-lg form-control">
                                                    <option value=""></option>
                                                    <option value="Alcohol Intoxication" <?php echo $row['trauma'] == 'Alcohol Intoxication'? 'selected': '';?>>Alcohol Intoxication</option>
                                                    <option value="Animal Bite" <?php echo $row['trauma'] == 'Animal Bite'? 'selected': '';?>>Animal Bite</option>
                                                    <option value="Drowning" <?php echo $row['trauma'] == 'Drowning'? 'selected': '';?>>Drowning</option>
                                                    <option value="Electrocution" <?php echo $row['trauma'] == 'Electrocution'? 'selected': '';?>>Electrocution</option>
                                                    <option value="Fall" <?php echo $row['trauma'] == 'Fall'? 'selected': '';?>>Fall</option>
                                                    <option value="Gunshot Wound" <?php echo $row['trauma'] == 'Gunshot Wound'? 'selected': '';?>>Gunshot Wound</option>
                                                    <option value="Hit and run" <?php echo $row['trauma'] == 'Hit and run'? 'selected': '';?>>Hit and run</option>
                                                    <option value="Mauling" <?php echo $row['trauma'] == 'Mauling'? 'selected': '';?>>Mauling</option>
                                                    <option value="Stab Wound" <?php echo $row['trauma'] == 'Stab Wound'? 'selected': '';?>>Stab Wound</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Burn(%TBSA)</label>
                                                <select name="burn" id="burn" class="form-control-lg form-control">
                                                    <option value=""></option>
                                                    <option value="First Degree" <?php echo $row['burn'] == 'First Degree'? 'selected': '';?>>First Degree</option>
                                                    <option value="Second Degree" <?php echo $row['burn'] == 'Second Degree'? 'selected': '';?>>Second Degree</option>
                                                    <option value="Superficial" <?php echo $row['burn'] == 'Superficial'? 'selected': '';?>>Superficial</option>
                                                    <option value="Deep" <?php echo $row['burn'] == 'Deep'? 'selected': '';?>>Deep</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Treatment</label>
                                                <select name="treatment" id="treatment" class="form-control-lg form-control">
                                                    <option value=""></option>
                                                    <option value="Airway Conduct"  <?php echo $row['treatment'] == 'Airway Conduct'? 'selected': '';?>>Airway Conduct</option>
                                                    <option value="Abdominal Thrus"  <?php echo $row['treatment'] == 'Abdominal Thrus'? 'selected': '';?>>Abdominal Thrust</option>
                                                    <option value="Bandaging"  <?php echo $row['treatment'] == 'Bandaging'? 'selected': '';?>>Bandaging</option>
                                                    <option value="Burn Care"  <?php echo $row['treatment'] == 'Burn Care" '? 'selected': '';?>>Burn Care</option>
                                                    <option value="Cold Application" <?php echo $row['treatment'] == 'Cold Application'? 'selected': '';?>>Cold Application</option>
                                                    <option value="Defibrillation"  <?php echo $row['treatment'] == 'Defibrillation'? 'selected': '';?>>Defibrillation</option>
                                                    <option value="Extrication"  <?php echo $row['treatment'] == 'Extrication'? 'selected': '';?>>Extrication</option>
                                                    <option value="Rescue Breathing" <?php echo $row['treatment'] == 'Rescue Breathing'? 'selected': '';?>>Rescue Breathing</option>
                                                    <option value="Nebulization" <?php echo $row['treatment'] == 'Nebulization"'? 'selected': '';?>>Nebulization</option>
                                                    <option value="Oxygen" <?php echo $row['treatment'] == 'Oxygen"'? 'selected': '';?>>Oxygen</option>
                                                    <option value="Spine Immobilization" <?php echo $row['treatment'] == 'Spine Immobilization'? 'selected': '';?>>Spine Immobilization</option>
                                                    <option value="Suctioning"  <?php echo $row['treatment'] == 'Suctioning'? 'selected': '';?>>Suctioning</option>
                                                    <option value="Spliting/Traction"  <?php echo $row['treatment'] == 'Spliting/Traction'? 'selected': '';?>>Spliting/Traction</option>
                                                    <option value="VS Checked" <?php echo $row['treatment'] == 'VS Checked'? 'selected': '';?>>VS Checked</option>
                                                    <option value="Wound Cleaning/Dressing" <?php echo $row['treatment'] == 'Wound Cleaning/Dressing'? 'selected': '';?>>Wound Cleaning/Dressing</option>
                                                    <option value="CPR" <?php echo $row['treatment'] == 'CPR'? 'selected': '';?>>CPR</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form">
                                        <div class="form-group">
                                            <label>Narratives</label>
                                              <textarea name="narrative" id="narrative" rows="9" placeholder="Write Narratives.." class="form-control"> <?php echo $row['narrative'];?></textarea>
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
                                     <div class="col col-md-4">
                                        <label>Dispatched Unit</label>
                                         <select name="dispatched_unit" class="form-control-lg form-control">
                                            <option value=""></option>
                                        <?php
                                            $query = "SELECT * FROM unit_name";
                                            $result = mysqli_query($conn,$query);
                                            while($row1=mysqli_fetch_assoc($result)){
                                                ?>
                                            <option value="<?php echo $row1['unit_name'];?>"><?php echo $row1['unit_name'];?></option>
                                       <?php } ?>
                                            </select>
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Treatment Officer</label>
                                        <input type="text" class="form-control" value ="<?php echo $row['treatment_officer'];?>" name="treatment_officer" id="treatment_officer">
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Trasnport Officer</label>
                                        <input type="text" class="form-control" value = "<?php echo $row['transport_officer'];?>" name="transport_officer" id="transport_officer">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label>Destination Determination</label>
                                        <select name="desti_deter" class="form-control-lg form-control">
                                            <option value=""></option>
                                            <option value="Closest Facility" <?php echo $row['desti_deter'] == 'Closest Facility' ? 'selected': '';?> >Closest Facility</option>
                                            <option value="Patient's Choice" <?php echo $row['desti_deter'] == "Patient's Choice" ? 'selected': '';?>>Patient's Choice</option>
                                            <option value="Family's Choice" <?php echo $row['desti_deter'] == "Family's Choice" ? 'selected': '';?>>Family's Choice</option>
                                            <option value="Medical Direction" <?php echo $row['desti_deter'] == "Medical Direction" ? 'selected': '';?>>Medical Direction</option>
                                            <option value="Law Enforcement Choice" <?php echo $row['desti_deter'] == "Law Enforcement Choice" ? 'selected': '';?>>Law Enforcement Choice</option>
                                            <option value="Protocol" <?php echo $row['desti_deter'] == "Protocol" ? 'selected': '';?>>Protocol</option>
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
                                        <input type="text" class="form-control" value="<?php echo $row['receiving_facility'];?>" name="receiving_facility" id="receiving_facility">
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
<?php }}?>
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

        });


    </script>


</body>

</html>
<!-- end document-->

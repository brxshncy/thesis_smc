
<?php
 include 'include/db.php';
 session_start();
 if(!isset($_SESSION['confirm_username'])){
                $_SESSION['msg'] = "You must log in first to view this page!";
                header("location:rescuer_login.php");
            }
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
                <div class="row">
                    <div class="col">
                         <div class="alert alert-success mt-2">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                    </div>
                </div>
                         <?php endif ?>

    <!--================================================================================================================-->

<form action="include/pcrformdb.php" method="POST">
    <?php
                if(isset($_SESSION['confirm_username'])){
                    $username = $_SESSION['confirm_username'];
                    $info = "SELECT *, t.unit_name as team, r.id as rescuer FROM rescuers r LEFT JOIN unit_name t ON t.id = r.team_unit WHERE username = '$username' ";
                    $query = $conn->query($info);
                    $fetch = mysqli_fetch_assoc($query);
                    $id = $fetch['rescuer'];
                    $team_id = $fetch['team_unit'];
                }
            ?>     
            <input type="hidden" name="sender" value="<?php echo $id;?>">
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
                                 Team Information
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Home Address</label>
                        <input type="text" class="form-control" name="home_address" id="home_address">
                    </div>
                </div>
                <hr>
                 <div class="row form-group">
                    <div class="col">
                        <label class=" form-control-label" for="poi" required>Place of Incidence (Please Select)</label>
                        <input type="radio" class="ml-2 mr-2" name="poi" id="scene" value="Scene">Scene
                        <input type="radio" class="ml-2 mr-2" name="poi" id="med" value="Medical Facility">Medical Facility
                    </div>
                    <div class="col form-inline">
                        <label for="date_i">Date of Incident</label>
                        <input type="date" name="date_i" id="date_i" class="form-control col-md-6 ml-3" required>
                    </div>
                </div>
                <div class="form-row mt-4" id="scene_field">
                        <div class="form-group col-md-3">
                            <label>Barangay</label>
                            <select name="barangay" id="barangay" class="form-control form-control-lg" style="height:38px;">
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
                <hr>
                <div class="row form-group">
                    <div class="col">
                        <label class=" form-control-label" for="gender">Gender</label>
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Male">Male
                        <input type="radio" class="ml-2 mr-2" name="gender" id="gender" value="Female">Female
                    </div>          
                </div>
                <hr>
                 <div class="row">
                    <div class="col">
                        <h3>Team Information</h3>
                    </div>
                </div>
                <?php 
                            $team = "
                            SELECT t.unit_name AS team, CONCAT(r.firstname,' ',r.lastname) AS team_leader
                            FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
                            WHERE r.team_unit = '$team_id' AND role = 'Team Leader'";
                            $qry_team = $conn->query($team) or trigger_error(mysqli_error($conn)." ".$team);
                            $res = mysqli_fetch_assoc($qry_team);

                            $transport_officer = "SELECT  CONCAT(r.firstname,' ',r.lastname) AS transport_officer
                            FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
                            WHERE r.team_unit = '$team_id' AND role = 'Transport Officer'";
                            $qry_transport = $conn->query($transport_officer) or trigger_error($conn." ".$transport_officer);
                            $res1 = mysqli_fetch_assoc($qry_transport);

                            $treatment_officer = "SELECT  CONCAT(r.firstname,' ',r.lastname) AS treatment_officer
                            FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
                            WHERE r.team_unit = '$team_id' AND role = 'Treatment Officer'";
                            $qry_treatment = $conn->query($treatment_officer) or trigger_error($conn." ".$treatment_officer);
                            $res2 = mysqli_fetch_assoc($qry_treatment);

                            $members = "SELECT COUNT(role) as member
                            FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
                            WHERE  r.team_unit = '$team_id' AND role = 'Member'";
                            $qry_members = $conn->query($members) or trigger_error($conn." ".$members);
                            $res3 = mysqli_fetch_assoc($qry_members);
                ?>
                <div class="row form-group mt-4">
                    <div class="form-group col-md-3">
                        <label>Team Name</label>
                        <input type="text"  id="team" class="form-control text-center" value="<?php echo $res['team'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Team Leader</label>
                        <input type="text" name="team_leader" id="team_leader" 
                        value="<?php echo (isset($res['team_leader']) && !empty($res['team_leader'])) ? $res['team_leader'] : 'Not yet assigned' ?>" class="form-control text-center" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Transport Officer</label>
                        <input type="text" name="transport_officer" id="transport_officer" 
                        value="<?php echo (isset($res1['transport_officer']) && !empty($res1['transport_officer'])) ? $res1['transport_officer'] : 'Not yet assigned' ?>" class="form-control text-center" readonly>
                    </div>
                     <div class="form-group col-md-3">
                        <label>Treatment Officer</label>
                        <input type="text" name="treatment_officer" id="treatment_officer" 
                        value="<?php echo (isset($res2['treatment_officer']) && !empty($res2['treatment_officer'])) ? $res2['treatment_officer'] : 'Not yet assigned' ?>" class="form-control text-center" readonly>
                    </div>
                </div>
                <div class="row form-group mt-2">
                    <div class="form-group col-md-2">
                        <label>Members</label>
                        <input type="text" 
                        value="<?php echo (isset($res3['member']) && !empty($res3['member'])) ? $res3['member'] : 'No members yet' ?>" class="form-control text-center" readonly>
                    </div>
                </div>
                    <div align="center">
                        <button type="button" name="btn_personal_info" id="btn_personal_info" class="btn btn-info btn">
                            Next
                        </button>
                        <input type="submit" name="upload" class="btn btn-success">
                    </div>
            </div>
            
        </div>
    </div>
     <!--====================================End Patient's Personal Info=================================================-->




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
            $('#scene_field').hide();
            $('#med_field').hide();

            $('#scene').click(function(){
               $('#scene_field').show();
               $('#med_field').hide();
            });

            $('#med').click(function(){
                $('#scene_field').hide();
                $('#med_field').show();
            })

            $('#btn_personal_info').click(function(){
                    $('#list_patient').removeClass('active');
                    $('#list_patient').removeClass('href data-toggle');
                    $('#personalinfo_content').removeClass('active');
                    $('#list_patient').addClass('inactive_tab');
                    $('#list_incident').removeClass('inactive_tab');
                    $('#list_incident').addClass('active');
                    $('#incident_details').attr('href','incident_details');
                    $('#list_incident').attr('data-toggle','tab');
                    $('#incident_details').addClass('active in');
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
                           if(typeof data.unit_name !== "undefined" && data.unit_name){
                                    $('#dispatched_unit').val(data.unit_name);
                                } else {
                                     $('#dispatched_unit').val('No Data');
                                }
                            if(typeof data.treatment_officer !== "undefined" && data.treatment_officer){
                                    $('#treatment_officer').val(data.treatment_officer);
                                } else {
                                     $('#treatment_officer').val('No Data');
                                }
                            if(typeof data.transport_officer !== "undefined" && data.transport_officer){
                                $('#transport_officer').val(data.transport_officer);
                            }else{
                                $('#transport_officer').val('No Data');
                            }
                            
                        }
                    });
               })

        });


    </script>


</body>

</html>
<!-- end document-->

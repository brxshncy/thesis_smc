
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

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
 <?php 

    include ('pcr-form-btn.php');
 ?>
<!--PATIENT INFO-->
<div class="tab-content" style="margin-top:16px;">
<div class="tab-pane active" id="personalinfo_content">
<div class="panel panel-default">
    <div class="panel-heading">Patient's Personal Info</div>
    <div class="panel-body">
        <?php
            include('pcr-form-patient.php');
        ?>
    <div class="row">
        <div class="col">
            <h3>Team Information</h3>
        </div>
    </div>

<!--TEAM INFO-->
<?php
    include('pcr-form-teaminfo.php');
?>
<!--TEAM INFO-->

<!--PATIENT INFO-->
<div align="center">
    <button type="button" name="btn_personal_info" id="btn_personal_info" class="btn btn-info btn">
        Next
    </button>
     <input type="submit" name="upload" class="btn btn-success">
</div>
</div>       
</div>
</div>

<!--PATIENT INFO-->

<!--Incident Details -->
<div class="tab-pane fade" id="incident_details">
<div class="panel panel-default">
<div class="panel-heading">Incident Info</div>
    <?php
        include('pcr-form-incident.php');
    ?>
</div>
</div>
<!--Incident Details -->


<!--VS Details -->
<div class="tab-pane fade" id="vsinfo_content">
<div class="panel panel-default">
<div class="panel-heading">Vital Signs Info</div>
    <?php 
        include('pcr-form-vs.php');
    ?>
 </div>
</div>
<!--VS Details -->




<!--Assesment Details -->
<div class="tab-pane fade" id="assesment_content">
<div class="panel panel-default">
<div class="panel-heading">Assesment</div>
<?php
    include('pcr-form-assesment.php');
?>
</div>
</div>
<!--Assesment Details -->      
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
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

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

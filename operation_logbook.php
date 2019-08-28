<?php
session_start();
include "include/db.php";
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
    <title>Operation Activities</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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
              <div class="col mt-4 bg-light p-4">
                    <h3>Rescuer Activity Log</h3>
                    <hr> 
                    <form action="include/operation_logs.php" methods="POST">
                        <div class="form-row">
                          <div class="form-group col-md-5">
                                <label>Rescuer Team</label>
                               <select name="respondents" id="respondents" class="form-control" required="">
                                <option value=""></option>
                                  <?php
                                    $team = "SELECT * FROM unit_name";
                                    $result = mysqli_query($conn,$team);
                                    while($row = mysqli_fetch_array($result)){                                  
                                ?>
                                  <option value="Illness"><?php echo $row['unit_name'];?> </option>
                                   <?php }?>
                               </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Type of Incident</label>
                               <select name="category" id="category" class="form-control"  required="">
                                 <option select="selected"></option>
                                  <option value="Illness">Illness</option>
                                  <option value="Accident">Accident</option>
                                  <option value="Natural Disaster">Natural Disaster</option>
                                  <option value="Others">Others</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md=5" id="illness_form">
                              <label>What kind of Illness?</label>
                              <input type="text" name="illness" id="illness" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md=5"  id="accident_form">
                              <label>What kind of Accident?</label>
                              <input type="text" name="accident" id="accident" class="form-control" required>
                          </div>
                        </div>
                         <div class="form-row">
                          <div class="form-group col-md=5"  id="disaster_form">
                              <label>What kind of Natural Disaster?</label>
                              <input type="text" name="natural_disaster" id="natural_disaster" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md=5"  id="others_form">
                              <label>Enter type of Incident</label>
                              <input type="text" name="others" id="others" class="form-control" required>
                          </div>
                        </div>
                         <div class="form-row">
                              <div class="form-group col-md-5">
                                <label>Date of Incident</label>
                                <input type="date" name="date_incident" id="date_incident" class="form-control">
                              </div>
                              <div class="form-group col-md-5">
                                <label>Time of Incident</label>
                                <input type="text" name="time_incident" id="time_incident" class="form-control">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-5">
                                <label>Location of Incident</label>
                                <input type="text" name="location" id="location" class="form-control">
                              </div>
                              <div class="form-group col-md-5">
                                <label>Vehicle Used</label>
                                <input type="text" name="vehicle" id="vehicle" class="form-control">
                              </div>
                          </div>
                           <div class="form-row">
                              <div class="form-group col-md-5">
                                <label>Unit Enroute</label>
                                <input type="text" name="unit_enroute" id="unit_enroute" class="form-control">
                              </div>
                              <div class="form-group col-md-5">
                                <label>Arrive at Scene</label>
                                <input type="text" name="arrive_scene" id="arrive_scene" class="form-control">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-5">
                                <label>No. of Patients</label>
                                  <select name="number_patient" id="number_patient" class="form-control">
                                      <option value="null"></option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                  </select>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col col-md-6">
                                  <button type="submit" name="submit" id="submit"  class="btn btn-primary">Submit</button> 
                              </div>
                        </div>    
                    </form>
              </div>
              <br>


<div class="col">
    <div class="card" id="patient_form">
        <div class="card-body">
            <div class="card-title">
                <h4 class="ml-2 p-2">Patient Information</h4>
            </div>
            <hr>
            <form action="include/patient.php" method="POST">
                <div class="form-row">
                    <div class="col col-md-5">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname">
                    </div>
                    <div class="col col-md-5">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname">
                    </div>
                </div>
                <div class="form-row">
                  <div class="col mt-2">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" id="address">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col col-md-5 mt-2">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="col mt-2">
                      <label>General Impression</label>
                      <input type="text" class="form-control" name="impression" id="impression">
                    </div>
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mt-3" style="">Save</button>
            </form>
        </div>
    </div>
</div>


         </div>
    </div>
</div>



                 <!--==================================== FOOTER ============================================================== -->
                        <?php include 'footer.php'?>
                 <!--==================================== FOOTER ============================================================== -->
              
        



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
      $("#illness_form").hide();
      $("#accident_form").hide();
      $("#disaster_form").hide();
      $("#others_form").hide();

        $('#category').on('change', function() {
              if ($("#category").val() === "Illness") {
                $("#illness_form").show();
              } else {
                $("#illness_form").hide();
              }
              if ($("#category").val() === "Accident") {
                $("#accident_form").show();
              } else {
                $("#accident_form").hide();
              }
              if ($("#category").val() === "Natural Disaster") {
                $("#disaster_form").show();
              } else {
                $("#disaster_form").hide();
              }
               if ($("#category").val() === "Others") {
                $("#others_form").show();
              } else {
                $("#others_form").hide();
              }
            });

    </script>

   

</body>

</html>
<!-- end document-->

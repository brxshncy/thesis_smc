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
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Type of Incident</label>
                               <select name="category" id="category" class="form-control">
                                 <option select="selected"></option>
                                  <option value="Illness">Illness</option>
                                  <option value="Accident">Accident</option>
                                  <option value="Natural Disaster">Natural Disaster</option>
                                  <option value="Others">Others</option>
                               </select>
                            </div>
                        </div> 
               </div>

              <div class="col mt-4 bg-light p-4">
                  <form action="include/accident.php" method="POST">
                     <h3>Accident</h3>
                      <hr> 
                      <label>Team Name</label>
                      <select name="team_unit" class="form-control col-md-6">
                        <option value=""></option>
                        <?php
                              $qry = "SELECT * FROM unit_name";
                              $result = $conn->query($qry);
                              while($row = mysqli_fetch_assoc($result)){
                          ?>
                            <option value="<?php echo $row['unit_name']; ?>"> <?php echo $row['unit_name']; ?> </option>

                      <?php } ?>
                        
                      </select>
                      <div class="form-row mt-2">
                          <div class="form-group col-md-6">
                              <label>What kind of Accident?</label>
                              <input type="text" name="kind_accident" id="kind_accident" class="form-control" >
                          </div>
                      </div>
                      <div class="input-group">
                            <input type="text" class="form-control col-md-6" name="vehicle[]" placeholder="Vehicle Involve">
                            <span class="input-group-btn">
                              <button class="btn btn-success ml-2" id="add_vehicle" type="button">Add</button>
                            </span>
                      </div><!-- /input-group -->
                      
                       <div class="wrapper" >
                          
                      </div><!-- /input-group -->
                      <hr>
                        <div class="form-row mt-2">
                          <div class="form-group col-md-6">
                              <label>Location of Incident</label>
                              <input type="text" name="location_incident" id="location_incident" class="form-control" >
                          </div>
                           <div class="form-group col-md-6">
                              <label>Date of Incident</label>
                              <input type="date" name="date_incident" id="date_incident" class="form-control" >
                          </div>
                      </div>
                       <div class="form-row mt-2">
                          <div class="form-group col-md-6">
                              <label>Time of Incident</label>
                              <input type="text" name="time_incident" id="time_incident" class="form-control" >
                          </div>
                      </div>
                        <div class="form-row mt-2">
                          <div class="form-group col-md-6">
                              <label>Unit Enroute</label>
                              <input type="text" name="unit_enroute" id="unit_enroute" class="form-control" >
                          </div>
                           <div class="form-group col-md-6">
                              <label>Arrive at Scene</label>
                              <input type="text" name="arrive_scene" id="arrive_scene" class="form-control" >
                          </div>
                      </div>
                      <div class="input-group">
                              <input type="text" name="patient[]" id="patient" class="form-control col-md-6" placeholder="Name of Patient" >
                               <span class="input-group-btn">
                              <button class="btn btn-success ml-2" id="add_patient" type="button">Add</button>
                            </span>
                      </div>
                      <div class=" patient_field">
                      </div>
                          <div class="row mt-4">
                            <div class="col col-md-6" style="margin:auto;">
                              <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  
             











       <!--==================================== END OF MAIN CONTENT ============================================================== -->   
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
      $(document).ready(function(){
        var i = 1;
          $('#add_vehicle').on('click',function(){
            i++;
            $('.wrapper').append('<div class="input-group mt-3" id="row'+i+'" ><input type="text" class="form-control col-md-6" name="vehicle[]" placeholder="Vehicle Involve"> <span class="input-group-btn"> <button class="btn btn-danger ml-3 btn_remove" name="remove" id="row'+i+'" type="button">X</button></span></div>');
          });
            $('body').on('click', '.btn_remove',function(e){
             
                $(this).parent().parent('div').remove();
           
            });                              
      });
      $(document).ready(function(){
          $('#add_patient').on('click',function(){
            var template = '<div class="input-group mt-2">';
            template += '<input type="text" name="patient[]" id="patient" class="form-control col-md-6" placeholder="Name of Patient" required>';
            template += '<span class="input-group-btn">';
            template += '<button class="btn btn-danger ml-2" id="btn_remove" type="button">Remove</button>';
            template += '</span>';
            template +='</div>';

            $('.patient_field').append(template);
          });
          $('body').on('click','#btn_remove',function(e){
              $(this).parent().parent('div').remove();
          });
      });
    </script>

   

</body>

</html>
<!-- end document-->

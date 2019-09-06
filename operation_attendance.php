  <?php 
  session_start();
  include 'include/db.php';
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
    <title>Operation Crew Attendance</title>

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
        <!-- END HEADER MOBILE-->
        <?php include 'header-mobile.php'; ?>
        <!-- MENU SIDEBAR-->
        <?php include 'menu-sidebar.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           <?php include 'header-php.php' ?>
            <!-- HEADER DESKTOP-->
            <!-- END HEADER DESKTOP-->


 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
       <div class="container-fluid">
            <div class="jumbotron" style="background-color: #fff;">
                <h2>Attendance Sheet</h2>
                <hr>
                <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                         <?php endif ?>
                  <div class="row">
                      <div class="col mb-3">
                        <input class="au-input au-input--xl mt-2" type="text" name="search" id="search" placeholder="Search Name..." />
                          <a href="view_attendance.php" class="btn btn-success btn-md pull-right">View Attendance</a>
                        </div>
                  </div>  
                <div class="alert alert-info" role="alert">
                      <div class="row justify-content-center">
                        <p>Date: <?php echo date("M-d-Y");?></p>
                     </div>
                </div>
                      <div class="table-responsive-md">
                          <form action="include/attendance_crew.php" method="POST">
                            <table class="table table-bordered" id="search_table">
                                <thead class="thead">
                                      <tr class="table-primary">
                                        <td>No.</td>
                                        <td>Name</td>
                                        <td>Contact</td>
                                        <td>Action</td>
                                      </tr>
                                </thead>
                                      <tbody>
                                              <?php
                                                  $result = $conn->query("SELECT * FROM rescuers");
                                                  $serialnumber = 0;
                                                  $counter=0;
                                                  while($row = mysqli_fetch_assoc($result)){
                                                     $serialnumber++;
                                                     $fullname  = $row['firstname']." ".$row['lastname'];
                                                    ?> 
                                                    <tr class="table-default">
                                                      <td><?php echo $serialnumber; ?></td>
                                                      <td><?php echo $fullname ?></td>
                                                      <input type="hidden" value="<?php echo $fullname; ?>" name="fullname[]" id="fullname">
                                                      <td><?php echo $row['contact'];?></td>
                                                      <input type="hidden" value="<?php echo $row['contact'];?>" name="contact[]" id="contact">
                                                      <td width="30%">
                                                        <div class="form-check form-check-inline">
                                                              <input class="form-check-input" type="radio" name="status[<?php echo $counter;?>]" id="status" value="Present">
                                                              <label class="form-check-label text-success" for="Present">Present</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                              <input class="form-check-input" type="radio" name="status[<?php echo $counter;?>]" id="status" value="Absent">
                                                              <label class="form-check-label text-danger" for="Absent">Absent</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                              <input class="form-check-input" type="radio" name="status[<?php echo $counter;?>]" id="status" value="Late">
                                                              <label class="form-check-label text-warning" for="Late">Late</label>
                                                            </div>
                                                      </td>
                                                    </tr>
                                                  <?php 
                                                  $counter++;
                                                  ?>
                                             <?php } ?>
                                      </tbody>
                            </table>
                          <br>
                          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
      </div>
</div>
      <?php include 'footer.php'; ?>
    <!-- END PAGE CONTAINER-->
</div>


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
        $('#search').keyup(function(){
          var search = $(this).val();
            $.ajax({
                url:'include/search_rescuer.php',
                method:'post',
                data:{search:search},
                success:function(data){ 
                  $('#search_table').html(data);
                }
            });
        });
      });
    </script>
</body>

</html>
<!-- end document-->

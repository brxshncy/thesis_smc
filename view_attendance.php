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
    <title>Check Dates </title>

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
                <h1 class="display-4">Dates</h1>
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
                         <input class="au-input au-input--xl mt-2" type="text" name="search" id="search" placeholder="Search date" />
                          <a href="operation_attendance.php"><button class="btn btn-primary ml-2 btn-block" data-placement="top" title="Back"> Back </button></a>
                        </div>
                  </div>  
                
                      <div class="table-responsive-md">
                            <table class="table table-bordered" id="table_search">
                                <thead class="thead">
                                      <tr class="table-primary">
                                        <td>No.</td>
                                        <td>Dates</td>
                                        <td>Show Attendance</td>
                                      </tr>
                                </thead>
                                      <tbody>
                                              <?php
                                                  $result = $conn->query("SELECT DISTINCT date FROM unit_attendance ORDER BY date DESC"); 
                                                  $serialnumber=0; 
                                                  while($row = mysqli_fetch_assoc($result)){
                                                  $serialnumber++;      
                                                    ?> 
                                                    <tr class="table-default">
                                                      <td><?php echo $serialnumber;?></td>
                                                      <td width="60%"><?php echo date("M d 20y",strtotime($row['date']));?></td>
                                                      <td>   
                                                      <form action="viewattendance_crew.php" method="POST">                              
                                                          <input type="hidden" value="<?php echo $row['date'];?>" name="date" id="date">
                                                          <input type="submit"  name ="submit" class="btn btn-primary" value="Show Attendance">
                                                        </form>
                                                      </td>
                                                    </tr>
                                             <?php } ?>
                                      </tbody>
                            </table>
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
                  url: "include/search_date.php",
                  method:"post",
                  data:{search:search},
                  success:function(data){
                    $('#table_search').html(data);
                  }

              })
          })
      });
    </script>
</body>

</html>
<!-- end document-->

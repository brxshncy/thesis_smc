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
                <h1 class="display-4">Crew Attendance Sheet</h1>
                <hr>                
                      <div class="table-responsive-md">
                          <form action="include/attendance_crew.php" method="POST">
                            <table class="table table-bordered">
                                <thead class="thead">
                                      <tr class="table-primary">
                                        <td>No.</td>
                                        <td>Name</td>
                                        <td>Team</td>
                                        <td>Status</td>
                                      </tr>
                                </thead>
                                      <tbody>
                                              <?php
                                                if(isset($_POST['submit'])){
                                                    $date = $_POST['date'];

                                                  $result = $conn->query("SELECT *, CONCAT(r.firstname,' ',r.lastname) AS name, t.unit_name as team  FROM unit_attendance ua LEFT JOIN rescuers r ON ua.rescuer_id = r.id LEFT JOIN unit_name t ON ua.team_id = t.id WHERE date = '$date'");
                                                  $serialnumber = 0;
                                                  $counter=0;
                                                  while($row = mysqli_fetch_assoc($result)){
                                                     $serialnumber++;
                                                    ?> 
                                                    <tr class="table-default">
                                                      <td><?php echo $serialnumber; ?></td>
                                                      <td><?php echo $row['name'];?></td>
                                                      <td><?php echo (isset($row['team']) && !empty($row['team'])) ? $row['team']: 'No Team';?></td>
                                                      <td width="30%">
                                                        <?php
                                                          if($row['status'] === "Present"){
                                                            echo "<p class='font-weight-bold text-success'> $row[status] </p>"; 
                                                          }
                                                          else if($row['status'] === "Absent"){
                                                            echo "<p class='font-weight-bold text-danger'> $row[status] </p>"; 
                                                          }
                                                          else if($row['status'] === "Late"){
                                                            echo  "<p class='font-weight-bold text-warning'> $row[status] </p>";
                                                          }
                                                         ?>   
                                                      </td>
                                                    </tr>
                                                  <?php 
                                                  $counter++;
                                                  ?>
                                             <?php }} ?>
                                      </tbody>
                            </table>
                          <br>
                        </form>
                        <div class="row mb-4">
                            <div class="col">
                                  <a href="view_attendance.php"><button type="submit" class="btn btn-primary">Back</button></a>
                            </div>
                        </div>
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
</body>

</html>
<!-- end document-->

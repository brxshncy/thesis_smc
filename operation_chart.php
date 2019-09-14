<?php
session_start();
include "include/db.php";
$query = "SELECT * FROM accident";
$result = $conn->query($query) or trigger_error(mysqli_error($conn)." ".$query);
$data1 = '';
$data2 = '';
$data3 = '';
while($row = mysqli_fetch_assoc($result)){
    $new = unserialize($row['new']);

    $vehicle_involve = [];
    $patient = [];

    if($new){
        $vehicle_involve =implode(',',$new['vehicle_involve']);
        $patient = $new['patient'];

        $data1 = $data1. '"'.$row['date_incident'].'",';
        $data2 = $data2. '"'.$vehicle_involve.'",';
       /* $data3 = $data3. '"'.$patient.'",';*/ 
    } 
    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
    $data3 = trim($data3,",");

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
    <title>Chart Reports</title>

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

              <h3 class="title-2 m-b-40">Bar chart</h3>
               <canvas id="chart"></canvas>
             
                  
             






  <!--==================================== END OF MAIN CONTENT=======================================================-->   
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
      var ctx = document.getElementById('chart').getContext('2d');
      var myChart = new Chart(ctx,{
        type: 'bar',
        data: {
            labels: '',
            datasets :[{
                   data: ['<?php echo $data1; ?>'],
                   backgroundColor: 'rgba(151,187,205,0.2)',
                   borderColor: 'rgba(151,187,205,1)',
                   pointBackgroundColor: 'rgba(151,187,205,1)'
            }]
        },
});
   </script>

   

</body>

</html>
<!-- end document-->

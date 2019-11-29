<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
    <title>Barangay Statistics Report</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>
<body class="animsition">
<div class="page-wrapper">
    <?php include ('secretary/scr_header.mobile.php'); ?>
    <?php include ('secretary/scr_sidebar.php');?>
    <?php include ('secretary/scr_header.php'); ?>
        <div class="page-container">
        
           
            


 <!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
    <div class="jumbotron" style="background-color: #fff;">
        <?php 
        require('include/db.php');
        $brgy = "SELECT brgy.baranggay_name as brgy, COUNT(brgy.baranggay_name) as tally  FROM barangay_responses brgy_res LEFT JOIN barangay brgy ON brgy.id = brgy_res.barangay_name GROUP BY brgy.baranggay_name";
        $run = $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
        $data = array();
       
       while($row = mysqli_fetch_assoc($run)){
           $brgy_name[] = $row['brgy'];
           $tally[] = $row['tally'];
           
      }
     
      
    ?>
      <canvas id="myChart" width="200" ></canvas>
    </div>
</div>
</div>
</div>


<!-- end modal scroll -->
<?php include 'footer.php';?>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
$(document).ready(function(){
    var chart = {
            labels: <?php echo json_encode($brgy_name) ?>,
            datasets:[
                {
                    label : "Barangay Incident Responses",
                    backgroundColor: 'rgba(226, 106, 106, 1)',
                    borderColor:'rgba(200, 200, 200, 0.75)',
                    hoverBackgroundColor : 'rgba(210, 77, 87, 1)',
                    hoverBorderColor: 'rgba(200,200,200,1)',
                    data: <?php echo json_encode($tally) ?>
                }
            ]
    }
                    var ctx = $('#myChart');
                    var barGraph = new Chart(ctx,{
                        type:'bar',
                        data:chart,
                         options: {
                            scaleShowValues:true,
                            scales:{
                                xAxes:[{
                                    ticks:{
                                        autoSkip: false,
                                        beginAtZero: true,
                                          min: 0
                                    }
                                }],
                                yAxes:[{
                                    ticks:{
                                        beginAtZero: true,
                                        min: 0,
                                         stepSize: 1
                                    }
                                }]

                            }
                        }
               
        })
})
    </script>
    
</body>

</html>
<!-- end document-->
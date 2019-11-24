<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'include/db.php';
			if(!isset($_SESSION['confirm_username'])){
				$_SESSION['msg'] = "You must log in first to view this page!";
				header("location:rescuer_login.php");
			}

			if(isset($_GET['logout'])){

				session_destroy();
				unset($_SESSION['confirm_username']);
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
    <title>Rescuer Homepage</title>

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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style>
        #emergency_notif
        {
            display: block;
            position: absolute;
            bottom: 50px;
            left: 50px;
        }
        .wrapper{
            display: table-cell;
            vertical-align:bottom;
            height:auto;
            width:200px;
        }
        .alert_default{
            color:#333333;
            background-color: #f2f2f2;
            border-color: #cccccc;
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php include 'header-mobile.php'; ?>
        <?php include 'rescuer_sidebar.php';?>
        <div class="page-container">
           <?php include 'rescuer_header.php' ?>
            


 <!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<?php
if(isset($_SESSION['confirm_username'])){
    $username = $_SESSION['confirm_username'];
    $info = "SELECT * FROM rescuers WHERE username = '$username' ";
    $query = $conn->query($info);
    $fetch = mysqli_fetch_assoc($query);
}
?>		
<h1>Welcome <?php echo ucfirst($fetch['firstname'])." ".ucfirst($fetch['lastname']) ?></h1>
<audio id="sound">
<source src="./audio/grad.mp3" type="audio/mpeg">
</audio>
<div class="card mt-4">
    <div class="card-header"><b>Emergency Calls</b></div>
      <div class="card-body">
        <div class="row">
             <div class="col-sm-12 table-responsive mt-4">
                <table id="item_list" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Patient Name</th>
                        <th class="text-center">Chief Complaints</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="incident_details">
                        <?php 
                            $logs = "SELECT * FROM emergency_call ORDER BY id DESC";
                            $res = $conn->query($logs) or trigger_error(mysqli_error($conn)." ".$logs);
                            $res_rows = mysqli_num_rows($res);
                            $counter = 0;
                            while($row = mysqli_fetch_assoc($res)){
                                $counter ++;
                                $patient = $row['p_fname']." ".$row['p_lname'];
                                
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $counter; ?></td>
                                <td class="text-center"><?php echo $patient  ?></td>
                                <td class="text-center"><?php echo $row['reason_call'];  ?></td>
                                <td class="text-center">
                                    <button class="item  show_data" style="color:green;" id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-place="top" title="View Full Details">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
             </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
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
    <script>
       $(document).ready(function(){
        $('table').DataTable();
            function emergency_notification(){
                $.ajax({
                    url:'include/emergency_notif.php',
                    method:'POST',
                    success:function(data){
                        if(data != ''){
                            console.log(data);
                                    $('audio').get(0).play();
                                    Swal.fire({
                                    'title': 'Warning!!!',
                                    'text': 'Emergency Alert!',
                                    'icon': 'warning',
                                    'backdrop': `
                                    rgb(255,0,0,0.2)
                                  `,
                                    confirmButtonText: 'Tap to Recieve',
                                    confirmButtonColor: '#DD6B55',
                                }).then((response)=>{
                                    if (response.value){
                                      location.reload();
                                    }
                                })

                        }else{
                            console.log(data);
                        }
                    },
                    error: function(data){
                        Swal.fire({
                            'title': 'Error',
                            'text': 'Unknown error!',
                            'type' : 'warning'
                        })
                    }
                })
            }
            setInterval(function(){
                emergency_notification();
            },3000);
        })
    </script>
</body>

</html>
<!-- end document-->
<?php
session_start();
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
    <title>Your Profile</title>

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
        <?php include 'rescuer_sidebar.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           <?php include 'rescuer_header.php' ?>
            <!-- HEADER DESKTOP-->
            <!-- END HEADER DESKTOP-->
                <!-- MODAL -->



<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
    <?php
        if(isset($_SESSION['confirm_username'])){
          	$username = $_SESSION['confirm_username'];
          	$info = "SELECT * FROM rescuers WHERE username = '$username' ";
          	$query = $conn->query($info);
          	$fetch = mysqli_fetch_assoc($query);
                    $name = $fetch['firstname']." ".$fetch['lastname'];
          }
    ?>		
<div class="row justify-content-center">
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
             <strong class="card-title mb-">Profile Card</strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class="rounded-circle mx-auto d-block" src="images/<?php echo $fetch['profile_picture'] ?>" height="250" width="200" alt="no profile">
                    <h5 class="text-sm-center mt-2 mb-1"><?php echo ucfirst($fetch['firstname'])." ".ucfirst($fetch['lastname']) ?></h5>
                     <div class="location text-sm-center">
                    <i class="fa fa-map-marker"></i> <?php echo $fetch['address'] ?></div>
            </div>
             <hr>
             <table class="table table-bordered mb-3">
               <tbody>
                    <tr>
                        <td width="30%" class="bg-light">First Name:</td>
                        <td width="70%" class="bg-light"><?php echo ucfirst($fetch['firstname']) ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="bg-light">Last Name:</td>
                        <td width="70%" class="bg-light"><?php echo ucfirst($fetch['lastname']) ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="bg-light">Gender:</td>
                        <td width="70%" class="bg-light"><?php echo $fetch['gender'] ?></td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td><?php echo $fetch['contact'] ?></td>
                    </tr>
                     <tr>
                        <td>Username:</td>
                        <td><?php echo $fetch['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Team:</td>
                        <td><?php echo(isset($fetch['team_unit']) && !empty($fetch['team_unit']) ? $fetch['team_unit'] : 'No team yet') ?></td>
                    </tr>
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
</body>

</html>
<!-- end document-->
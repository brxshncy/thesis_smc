 <?php
include 'rescuer_regdb.php';
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
    <title>Register</title>
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
<body class="bg-secondary">
    <div class="row">
        <div class="col-md-5">
            <div class="card text-center" style="margin:auto;" >
                <div class="card-header p-4 bg-white">
                        <span style = "font-weight:bold;" class="text-danger">ICDRRMO Rescuer</span> Registration Form
                </div>
                      <div class="card-body">
                            <form action="rescuer_registration.php" method="post" enctype="multipart/form-data">
                                <?php if(isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success">

                                        <p><?php echo $_SESSION['success']; 
                                                unset($_SESSION['success']);
                                        ?>
                                          <a href="rescuer_login.php">Log in now!</a>      
                                        </p>
                                    </div>
                                <?php endif ?>
                                <div class="form-row">
                                <div class="col-sm-6">
                                    <input type="text" style ="border-radius:10px;"name="firstname" id="firstname" class="au-input au-input--full border border-secondary" placeholder="First Name" value="<?php echo $firstname; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" style ="border-radius:10px;"name="lastname" id="lastname" class="au-input au-input--full border border-secondary" placeholder="Last Name" value="<?php echo $lastname; ?>">
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col">
                                    <input type="text" style ="border-radius:10px;"name="address" id="address" class="au-input au-input--full border border-secondary" placeholder="Address" value="<?php echo $address; ?>">
                                </div>
                            </div>
                             <div class="form-row mt-4">
                                <div class="col">
                                    <select name="gender" style ="border-radius:10px;" id="gender" class="form-control">
                                        <option value="">Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col">
                                    <input type="text" style ="border-radius:10px;" name="contact" id="contact" class="au-input au-input--full border border-secondary" placeholder="Contact" value="<?php echo $contact; ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row mt-4">
                                <div class="col">
                                    <input type="text" style ="border-radius:10px;" name="username" id="username" class="au-input au-input--full border border-secondary" placeholder="User Name" value="<?php echo $username; ?>">
                                    <p id="username_require" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col col-md-6">
                                    <input type="password" style ="border-radius:10px;"name="password" id="password" class="au-input au-input--full border border-secondary" placeholder="Password">
                                </div>
                                <div class="col col-md-6">
                                    <input type="password" style ="border-radius:10px;"name="confirm_password" id="confirm_password" class="au-input au-input--full border border-secondary" placeholder="Retype Password">
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col col-md-6">
                                    <input type="file" name="profile_picture" id="profile_picture">
                                </div>
                            </div>
                             <button class="au-btn au-btn--block au-btn--green m-b-20 mt-4" type="submit" name="register">Register</button>
                             <?php include('error_rescureg.php'); ?>
                            </form>
                </div>
            </div>
         </div>
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

<style>

*{
    margin: 0px;
    padding: 0px;
    
}

.col-md-5{
    margin: 50px auto;
}
</style>
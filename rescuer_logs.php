
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
        <?php include 'header-mobile.php'; ?>
        <?php include 'rescuer_sidebar.php';?>
        <div class="page-container">
           <?php include 'rescuer_header.php' ?>
            


 <!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="jumbotron" style="background-color: #fff;">
        <div class="row">
            <div class="col">
                <h3>Activity Logs</h3>
            </div>
        </div>
        <hr>
        <div class="row mt-2">
            <div class="col-sm-12 table-responsive mt-3">
                <table id="item-list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Activity Logs</th>

                            </tr>
                        </thead>
                        <tobdy>
                            <?php 
                                if(isset($_SESSION['confirm_username'])){
                                    $counter = 1;
                                    $username = $_SESSION['confirm_username'];
                                    $team = "SELECT t.unit_name as team, p.date_i as date_i, p.id as id  FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id LEFT JOIN pcr_official p  ON r.id = p.rescuer_id  WHERE username = '$username' ";
                                    $result = $conn->query($team) or trigger_error(mysqli_error($conn)." ".$team);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                     ?>
                            <tr>
                                <td class="text-center"><?php echo $counter; ?></td>
                                <td class="text-center"><?php echo "Your team ".$row['team']." has responded to an incident on ".$row['date_i']. " <button type='button' title='View' data-placement='top' class='item font-weight-bold text-success view' id=".$id.">View Full Details</button>" ?></td>
                               
                            </tr>          

                             <?php   $counter ++;    }
                                }
                            ?>
                       </tobdy>
                </table>
            </div>
        </div>

</div>
</div>
</div>
</div>
            <?php include 'footer.php';?>
   <div class="modal fade" id="logs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                         
                          <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Team Activity Logs</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id= "logs_data" >
                              

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
    <script>
        $(document).ready(function(){
            $('.view').click(function(){
                var id = $(this).attr('id');

                $.ajax({
                    url: 'rescuer_view_logs.php',
                    method:'post',
                    data:{id:id},
                    success:function(data){
                        $('#logs_data').html(data);
                        $('#logs_modal').modal('show');
                    }
                })
            })
        })
    </script>
</body>

</html>
<!-- end document-->
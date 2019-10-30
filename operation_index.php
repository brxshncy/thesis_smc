<?php 
require ('include/db.php');
  session_start();
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
    <title>Operation Dashboard</title>

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <!-- END HEADER MOBILE-->
        <?php include 'header-mobile.php'; ?>
     
        <?php include 'menu-sidebar.php';?>
      
        <div class="page-container">
           
           <?php include 'header-php.php' ?>
           
            
            


 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                         <h2 class="title-1">overview</h2>
                    </div>
                </div>
            </div>
             <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <a href="pcr-addteam.php"><i class="far fa-flag"></i></a>
                                </div>
                                            <div class="text">
                                            <?php
                                                $teams = "SELECT COUNT(id)  AS team FROM unit_name";
                                                $result = $conn->query($teams);
                                                $count_team = mysqli_num_rows($result);
                                                $row = mysqli_fetch_assoc($result);
                                                $team = $row['team'];
                                                
                                            ?>
                                                <h2><?php echo $team; ?></h2>
                                                <span><?php echo 'Team' . (($team > 1) ? 's' : '');?></span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                </div>
                              <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                    $rescuer = "SELECT COUNT(id) as rescuer FROM rescuers ";
                                                    $result2 = $conn->query($rescuer) or trigger_error(mysqli_error($conn)." ".$rescuer);
                                                    $count_rescuer = mysqli_num_rows($result2);
                                                    $row2= mysqli_fetch_assoc($result2);
                                                    $rescuer = $row2['rescuer'];
                                                ?>
                                                <h2><?php echo $rescuer ?></h2>
                                                <span>Registered Rescuer</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <a href="opr_inventory.php"><i class="zmdi zmdi-shopping-cart"></i></a>
                                            </div>
                                            <div class="text">
                                            <?php
                                                $item = "SELECT COUNT(id) as item from items";
                                                $result3 = $conn->query($item) or trigger_error(mysqli_error($conn)." ".$item);
                                                $count_item = mysqli_num_rows($result3);
                                                $row3 = mysqli_fetch_assoc($result3);
                                                $inventory = $row3['item'];
                                            ?>
                                                <h2><?php echo $inventory ?></h2>
                                                <span>items available in inventory</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                               <a href="pcr-record.php"> <i class="zmdi zmdi-calendar-note"></i></a>
                                            </div>
                                            <div class="text">
                                                <?php 
                                                    $pcr = "SELECT COUNT(id) as pcr FROM  pcr";
                                                    $result1 = $conn->query($pcr) or trigger_error(mysqli_error($conn)." ".$pcr);
                                                    $count_pcr = mysqli_num_rows($result1);
                                                    $row1 = mysqli_fetch_assoc($result1);
                                                    $record = $row1['pcr'];
                                                ?>
                                                <h2><?php echo $record ?></h2>
                                                <span><?php echo 'You have'." ".$record." PCR pending request" . (($count_pcr > 1) ? 's' : '');?></span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
             <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Patient Care Reports</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Full Name</th>
                                                <th class="text-center">Date Incident</th>
                                                <th class="text-center">Time Incident</th>
                                                <th class="text-center">Respondents</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                              $select = "SELECT *, un.unit_name AS unit_name, pcr_official.id AS id FROM pcr_official LEFT JOIN unit_name un ON un.id = pcr_official.team_id ORDER BY pcr_official.id  ASC";
                              $counter = 0;
                              $result = mysqli_query($conn,$select);
                            ?>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                  $counter++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $counter;?></td>
                                <td class="text-center"><?php echo $row['firstname'];?><?php echo " "?><?php echo $row['middlename'];?> <?php echo " ";?><?php echo $row['lastname'];?></td>
                                <td class="text-center"><?php echo (isset($row['date_i']) && !empty($row['date_i']) ? $row['time_i'] : 'No data')?></td>
                                <td class="text-center"><?php echo (isset($row['time_i']) && !empty($row['date_i']) ? $row['time_i'] : 'No data') ?></td>
                                <td class="text-center"><?php echo (isset($row['unit_name'])) && !empty($row['unit_name']) ? $row['unit_name'] : 'No data' ?></td>
                                <td class="text-center">
                                       <a href="pcr_view.php?view=<?php echo $row['id'];?>">
                                            <button class="item mr-2" style="color:green;" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                                <i class="fa fa-eye"></i>
                                             </button>
                                        </a> 
                                        <a href="pcrofficial_edit.php?view=<?php echo $row['id'];?>">
                                            <button class="item mr-2" style="color:blue;"data-toggle="modal"  data-placement="top" id="<?php echo $row['id']; ?>" title="Update Details">
                                                 <i class="fa fa-edit (alias)"></i>
                                            </button> </a>
                                             <button class="item del_btn" style="color:red;" data-toggle="modal" data-placement="top" title="Delete" id="<?php echo $row['id']; ?>">
                                                 <i class="zmdi zmdi-delete"></i></button>
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script>
       $(document).ready(function(){
            $('tables').DataTable();
       })
     
    </script>

</body>

</html>
<!-- end document-->

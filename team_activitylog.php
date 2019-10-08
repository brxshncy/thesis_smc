<?php
require 'include/db.php';
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
    <title>Activity Log</title>

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

        
            <!--================================================================ MODAL =======================================================================================-->
             <!--Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                         
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Patient Care Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id= "update_details" >
                            
                        </div>
                      </div>
                    </div>
                  </div>
            <!-- end modal scroll -->

            <!--================================================================ MODAL =======================================================================================-->

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="jumbotron" style="background-color: #fff;">
                <div class="row">
                    <div class="col">
                <?php
                    if(isset($_GET['log'])){
                        $id = $_GET['log'];
                        $qry = "SELECT * FROM unit_name WHERE id  = '$id'";
                        $result  = $conn->query($qry);
                        while($row = mysqli_fetch_assoc($result)){?>
                        <h3> <?php echo $row['unit_name'];?> Activity Logs</h3>
                <?php }} ?>
                
                    </div>
            </div>
                <hr> 
            <div class="table-responsive-md">
                <table class="table table-bordered">
                    <thead class="thead">
                        <tr class="table-primary" style="border-color:black;">
                            <th>No.</th>
                            <th>Patient Name</th>
                            <th>Date of Incident</th>
                            <th>Time of Incident</th>
                            <th>Incident</th>
                            <th>Patient Status</th>

                            

                        </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($_GET['log'])){
                        $id = $_GET['log'];
                        $qry = "SELECT CONCAT(p.firstname,' ',p.lastname) AS name, p.date_i as date_i, p.time_i as time_i, p.impression as impression, p.reason as status FROM unit_name un LEFT JOIN pcr_official p ON un.id = p.team_id WHERE p.team_id = '$id'";
                        $result = $conn->query($qry) or trigger_error(mysqli_error($conn)." ".$qry);
                        $counter = 0;
                        if(mysqli_num_rows($result)>0){
                        while($row = $result->fetch_object()){
                                 $counter++;        
                         ?>
                         <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo (isset($row->name)) && !empty($row->name) ? $row->name : 'No data'; ?> </td>
                                <td><?php echo (isset($row->date_i)) && !empty($row->date_i) && $row->date_i == '0000-00-00 '? $row->date_i : 'No data';?></td>
                                <td><?php echo (isset($row->time_i)) && !empty($row->time_i) ? $row->time_i : 'No data'?></td>
                                <td><?php echo (isset($row->status)) && !empty($row->status) ? $row->status : 'No data' ?></td>
                                <td><?php echo (isset($row->impression)) && !empty($row->impression) ? $row->impression : 'No data' ?></td>
                        </tr>
                   <?php }   }else{
                     echo "<td colspan='6'>No recent activity Logs</td>";
                   }
                    }
                ?>
            </tbody>
            </table>
        </div>
              </div>            
         </div>
    </div>
</div>



                 <!--==================================== FOOTER ============================================================== -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Bruce Real. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
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
        // EDIT 
        $(document).ready(function(){
                $(document).on('click','.edit_button',function(){
                        var edit_id = $(this).attr('id');
                        $.ajax({
                            url: "include/editmember.php",
                            type: "post",
                            data: {edit_id:edit_id},
                            success:function(data){
                                $("#update_details").html(data);
                                 $('#editModal').modal('show');
                            }
                        })
                });
        });

        //UPDATE
     
    </script>

</body>

</html>
<!-- end document-->

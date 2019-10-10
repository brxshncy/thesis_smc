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
    <title>Members</title>

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
            <div id="no-members">
              <h1>No Members Yet</h1>
            </div>
                    <div class="row">
                    <?php

                    if(isset($_GET['view'])){
                                $id = $_GET['view'];
                       /* $query = "SELECT unit_name.unit_name as unit_name, assign_rescuer.id as id, assign_rescuer.firstname as firstname,assign_rescuer.lastname as lastname, assign_rescuer.gender as gender, assign_rescuer.address as address, assign_rescuer.contact as contact FROM unit_name, assign_rescuer WHERE unit_name.unit_name = assign_rescuer.unit_name AND unit_name.id = '$id' ";   */ 

                        $query = "SELECT ar.*, CONCAT(r1.firstname,' ', r1.lastname) AS name, r1.address AS address, r1.profile_picture AS profile, r1.gender AS gender, r1.contact AS contact, ar.role as role, team.unit_name AS team FROM teams ar LEFT JOIN rescuers r1 ON r1.id = ar.rescuers_id LEFT JOIN unit_name team ON team.id =ar.team_id WHERE ar.team_id = '$id' ";


                        $result = $conn->query($query);
                        if (mysqli_num_rows($result)>0){      
                        while($row = $result->fetch_object()){   
                        $name = $row->name;  
                                        
                     ?>                 
                        <div class="col-md-4 ">
                             <div class="card">
                                     <div class="card-header">
                                      <strong class="card-title mb-3">Profile</strong>
                                      </div>
                                          <div class="card-body">
                                              <div class="mx-auto d-block">
                                                 <img class="rounded-circle mx-auto d-block" src="images/<?php echo $row->profile; ?>" alt="Card image cap">
                                                  <h5 class="text-sm-center mt-2 mb-1"><?php echo $name; ?></h5>
                                                <div class="location text-sm-center">
                                                <i class="fa fa-map-marker"></i> <?php echo $row->address;?></div>
                                           </div>
                                                    <hr>
                                                    <p>Gender: <?php echo $row->gender;?></p>
                                                    <p>Contact: <?php echo $row->contact;?></p>
                                                    <p class="">Role: <i class="text-success"><?php echo $row->role; ?></i></p>
                                                    <p>Action: <a></a> <a href=""></a>
                                                        <button class="item edit_button"  style="color:blue;" data-toggle="modal"  data-placement="top" id="<?php echo $row->id; ?>" title="Edit">
                                                             <i class="fa fa-edit"></i>
                                                        </button> || <a href="include/delete_member.php?delete=<?php echo $row->id; ?>" style="color:red;" title="Remove Member">  <i class="fa fa-scissors"></i></a></p> 

                                                        <script type="text/javascript">
                                                          document.getElementById('no-members').style.display = 'none';
                                                       </script>
                         </div>
                    </div> 
                 </div>
                    <?php  
                    
                        }}} 
                    ?> 
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

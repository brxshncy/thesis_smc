  <?php 
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
    <title>Patient Care Records</title>

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


                <!-- MODAL -->
                <!-- Delete Modal -->
                  <div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to Delete?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-danger" id="delete">Delete</button>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- Delete Modal -->

               <!--Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
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


 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
          
            <div class="row">
                 <div class="col-md-12">
                  <!-- DATA TABLE -->
                    <!-- REQUIRE DB -->
                   <?php require_once "include/db.php";  ?>

                   <!-- SESSION MESSAGE-->
                       
                   <!-- SELECTING DATA FROM TABLE-->
                    <?php 
                           $conn = new mysqli('localhost','root','','icdrrmo') or die(mysqli_error($conn));
                           $result = $conn->query("SELECT * FROM pcr");
                    ?>
                    <div class="alert alert-danger" role="alert" id="alert">
                            This is a danx`ger alert—check it out!
                    </div>
                     <div class="row">
                      <br>
                       <div class="col mt-4 bg-light p-4">
                        <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>

                         <?php endif ?>
                    <p>Patient Care Report Records</p>
                    <hr> 
                    <div class="row">
                      <div class="col mb-3">
                          <input class="au-input au-input--xl mt-2" type="text" name="search" id="search" placeholder="Search for datas &amp; records..." />
                           <a href="pcr-form.php"> <button class="btn btn-primary ml-2 btn-block" data-placement="top" title="Input Patient Care Report"> Patient Care Report </button></a>
                         </div>
                    </div>
                              
                 <div class="table-responsive">      
                    <table class="table table-striped w-100 table-light" id="table_search">
                        <thead>
                            <tr class="table-info">
                             <th>No.</th>
                             <th>Full Name</th>
                             <th>Date Incident</th>
                             <th>Time Incident</th>
                             <th>Respondents</th>
                             <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $select = "SELECT * FROM pcr ORDER BY id DESC";
                              $counter = 0;
                              $result = mysqli_query($conn,$select);
                            ?>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                  $counter++;
                            ?>
                            <tr>
                                <td class=""><?php echo $counter;?></td>
                                <td><?php echo $row['firstname'];?><?php echo " "?><?php echo $row['middlename'];?> <?php echo " ";?><?php echo $row['lastname'];?></td>
                                <td><?php echo $row['date_i'];?></td>
                                <td><?php echo $row['time_i'];?></td>
                                <td><?php echo $row['dispatched_unit'];?></td>
                                <td>
                                       <a href="pcr_view.php?view=<?php echo $row['id'];?>">
                                            <button class="item" style="color:green;" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                                <i class="fa fa-eye"></i>
                                             </button>
                                        </a> ||
                                            <button class="item edit_button" style="color:blue;"data-toggle="modal"  data-placement="top" id="<?php echo $row['id']; ?>" title="Update Details">
                                                 <i class="fa fa-edit (alias)"></i>
                                            </button> ||
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
        <div id="here">
        </div>
                                <!-- END DATA TABLE -->
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
    <script>
      $('#alert').hide();
        // EDIT 
        $(document).ready(function(){
                $(document).on('click','.edit_button',function(){
                        var edit_id = $(this).attr('id');

                        $.ajax({
                            url: "include/edit.php",
                            type: "post",
                            data: {edit_id:edit_id},
                            success:function(data){
                                $("#update_details").html(data);
                                 $('#editModal').modal('show');
                            }
                        })
                });
        });

        //DELETE VIEW
        $(document).ready(function(){
          $(document).on('click','.del_btn',function(){
                    $('#del_modal').modal('show');
                 
          });
        });

         //DELETE 
        $(document).ready(function(){
          $(document).on('click','#delete',function(){
               var del_id = $('.del_btn').attr('id');
                $.ajax({
                  url:"include/delete.php",
                  type: "post",
                  data:{del_id:del_id},
                  success:function(data){
                    location.reload();
                    $('#del_modal').modal('hide');
                  }
                })
          });
        });


       $(document).ready(function(){
        $("#search").keyup(function(){
          var search = $(this).val();

           $.ajax({
              url: 'include/search_action.php',
              type: 'post',
              data:{search:search},
              success:function(data){
                $('#table_search').html(data);
              }
           })
        });
      });

        
     
    </script>

</body>

</html>
<!-- end document-->

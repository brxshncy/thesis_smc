<?php
session_start();
include "include/db.php";
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
    <title>Crew Locator Slip</title>

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

           <!-- modal editteam  -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="scrollmodalLabel">Edit Slip </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
        <div class="modal-body" id="update_details">
                                        
         </div>
     </div>
  </div>
</div>

     <!-- end of modal edit team  -->

<!-- Locator Slip Modal -->
<div class="modal fade" id="locator_slip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
			      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Locator Slip</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
			      </div>
		      <div class="modal-body">
		       			<form action="include/locator.php" method="post">
		       				<div class="form-group">
		       					<label>Employe Name</label>
		       					<input type="text" class="form-control	" name="employee_name" id="employee_name">
		       				</div>
		       				<div class="form-group">
		       					<label>Destination</label>
		       					<input type="text" class="form-control	" name="destination" id="destination">
		       				</div>
		       				<div class="form-group">
		       					<label>Purpose</label>
		       					<input type="text" class="form-control	" name="purpose" id="purpose">
		       				</div>
		       				<div class="form-group">
		       					<label>Date</label>
		       					<input type="date" class="form-control	" name="date" id="date">
		       				</div>
		       				<div class="form-group">
		       					<label>Time</label>
		       					<input type="text" class="form-control	" name="time" id="time">
		       				</div>
		       				<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <input type="submit" class="btn btn-primary" value="Save" name="save" id="save">
		      </div>	
		      </form> 
		      </div>
	   	 </div>	     
	  </div>
</div>

            <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
          <div class="container-fluid">
              <div class="col mt-4 bg-light p-4">
              	 <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                         <?php endif ?>
                <div class="panel panel-primary">
                  <h2>Locator Table</h2>
                </div>
                <hr>
                	<div class="row">
                		<div class="col mb-4">
                			<input class="au-input au-input--xl mt-2" type="text" name="search" id="search" placeholder="Search for datas &amp; records..." />
           					<button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#locator_slip">Locator Slip</button>
           				
           			</div>
           		</div>
           				<div class="table-responsive-md">
	           				<table class="table table-hover table-light" id="table_search">
	           					<thead>
	           						<tr class="table-info">
	           							<td>Employee ID</td>
	           							<td>Employee Name</td>
	           							<td>Destination</td>
	           							<td>Purpose</td>
	           							<td>Date</td>
	           							<td>Time</td>
	           							<td>Action</td>
	           						</tr>
	           					</thead>
	           					<tbody>
	           						<?php
	           							$result = $conn->query("SELECT * FROM locator_slip");
	           							while($row = $result->fetch_assoc()){
	           						?>
	           							<tr>
	           								<td><?php echo $row['id']; ?></td>
	           								<td><?php echo $row['employee_name']; ?></td>
	           								<td><?php echo $row['destination']; ?></td>
	           								<td><?php echo $row['purpose']; ?></td>
	           								<td><?php echo $row['date']; ?></td>
	           								<td><?php echo $row['time']; ?></td>
	           								<td>
	           							<div class="">
                                             <button class="btn btn-flat btn-success btn-sm edit_modal"  data-toggle="modal" title="Edit Record" id="<?php echo $row['id'];?>">
                                              <i class="fa fa-edit"></i>
                                            </button>
                                              <a href="include/delete_locator.php?delete=<?php echo $row['id']; ?>"> 
                                            <button class="btn btn-flat btn-danger  btn-sm"  data-toggle="tooltip" title="Delete Record" id="delete"><i class="zmdi zmdi-edit"></i></button></a>
                                      </div>
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
    	$(document).ready(function(){
          $(document).on('click','.edit_modal',function(){
              var edit_locator = $(this).attr('id');
                $('#edit').modal('show');
                $.ajax({
                    url: 'include/edit_locator.php',
                    type: 'post',
                    data:{edit_locator:edit_locator},
                    success:function(data){
                        $("#update_details").html(data);
                                 $('#edit').modal('show');
                    }
                })
          });

      });
    </script>

</body>

</html>
<!-- end document-->

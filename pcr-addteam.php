 <?php 
session_start();
include 'include/db.php';
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
  <title>Manage Team Rescuer</title>

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

            <!-- modal addteam  -->
<div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="scrollmodalLabel">Add Team </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
        <div class="modal-body">
                <form action="include/group-respondent.php" method="POST">
                     <div class="form-group">
                            <label>Team Unit's Name</label>
                             <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="">
                       </div>
                     <div class="form-group">
                             <label> Vehicle Name</label>
                             <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" placeholder="">
                      </div>
                      <div class="form-group">
                              <label>Assign Transport Officer</label>
                              <input type="text" class="form-control" id="transport_officer" name="transport_officer" placeholder="">
                      </div>
                      <div class="form-group">
                               <label>Assign Treatment Officer</label>
                               <input type="text" class="form-control" id="treatment_officer" name="treatment_officer" placeholder="">
                     </div> 
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
                                  
                 </form>                          
         </div>
     </div>
  </div>
</div>
     <!-- end of modal addteam  -->


            <!-- modal editteam  -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="scrollmodalLabel">Edit Team Crews </h5>
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

      <!-- modal add team member -->
      <div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="scrollmodalLabel">Add Team Crew</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                  <div class="modal-body">
                        <form action ="include/addteamdb.php" method= "POST" enctype="multipart/form-data">
                               <div class="form-group">
                                    <label>Members Registered</label>
                                    <select class="form-control" id="members" name="members">
                                      <option value="">Select</option>
                                    <?php
                                        $members = $conn->query("SELECT * FROM rescuers");
                                        while($row = $members->fetch_assoc()){
                                          $name = $row['firstname']." ".$row['lastname'];
                                          echo '<option value="'.$row['id'].'">' .$name. '</option>';
                                        }
                                     ?>
                                      </select>
                                </div>
                              <div id="other_info">
                                <div class="form-row">
                                          <div class="col-md-6">
                                              <label>First Name</label>
                                              <input type="text" class="form-control" name="firstname" id="firstname" readonly="">
                                         </div>
                                         <div class="col-md-6">
                                              <label>Last Name</label>
                                              <input type="text" class="form-control" name="lastname" id="lastname" readonly>
                                         </div>
                                  </div>
                                    <div class="form-row">
                                          <div class="col-md-6">
                                              <label>Address</label>
                                              <input type="text" class="form-control" name="address" id="address" readonly="">
                                         </div>
                                         <div class="col-md-6">
                                              <label>Contact</label>
                                              <input type="text" class="form-control" name="contact" id="contact" readonly>
                                         </div>
                                  </div>
                                   <div class="form-row mt-2">
                                          <div class="col-md-6">
                                              <label>Gender</label>
                                              <input type="text" class="form-control" name="gender" id="gender" readonly>
                                         </div>
                                  </div>
                                   <div class="form-row mt-2">
                                          <div class="col">
                                              <label>Username</label>
                                              <input type="text" class="form-control" name="username" id="username" readonly>
                                         </div>
                                  </div>
                          </div>

                              <div class="form-group mt-4">
                                    <label>Team Name</label>
                                    <select class="form-control" id="team_name" name="team_name">
                                    <?php
                                        $select_team = $conn->query("SELECT * FROM unit_name");
                                        while($select = $select_team->fetch_assoc()){
                                    ?>  
                                              <option><?php echo $select['unit_name'];?></option>
                                            
                                         <?php }?>
                                 </select>
                              </div>
                                                                
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" id="upload" name="upload" value="Upload">
                      </div>
            </form>  
          </div>
        </div>
      </div>
      <!-- end modal add team member -->

      <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
       <div class="container-fluid">
            <div class="jumbotron" style="background-color: #fff;">
                <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                         <?php endif ?>
                <h2>Manage Team Rescuer</h2>
                <hr>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#scrollmodal" data-placement="top" title="Add Team ">
                        <i class="far fa-flag"></i>
                </button>
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmember" data-placement="top" title="Add Team Member">
                       <i class="fas fa-users"></i>
                </button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addmember" data-placement="top" title="Add Team Member">
                       <i class="fas fa-ambulance"></i>
                </button>
                    <br>
                    <br>
               <div class="table-responsive-md">  
                    <table class="table table-bordered">
                        <thead class="thead">
                          <tr class="table-primary" style="border-color:black;">

                                   <th>No.</th>
                                   <th>Team Unit Name</th>
                                   <th >Transport Officer</th>
                                   <th>Treatment Officer</th>
                                   <th >Vehicle</th>                               
                                   <th>Action</th>
                          </tr>
                         </thead>
                             <tbody>
                                <?php                                    
                                     $result = $conn->query("SELECT * FROM unit_name");
                                     $counter = 0;
                                       while($row = $result->fetch_assoc()){
                                        $counter++;
                                 ?>
                                    
                                     <tr class="table-default">
                                        <td><?php echo $counter;?></td>
                                        <td><?php echo $row['unit_name'];?></td>
                                        <td><?php echo $row['transport_officer'];?></td>
                                        <td><?php echo $row['treatment_officer'];?></td>
                                        <td><?php echo $row['vehicle_name'];?></td>
                                        <td>
                                           <a href="view_member.php?view=<?php echo $row['id'];?>">
                                            <button class="item" style="color:green;" data-toggle="modal" data-target="#" title="View Unit Members" id="add"> <i class="fa fa-users"></i></button>
                                        </a> ||
                                             <button class="item edit_modal" style="color:blue;" data-toggle="modal" title="Edit Record" id="<?php echo $row['id'];?>">
                                                <i class="fa fa-edit"></i>
                                            </button> ||
                                              <a href="include/delete_team.php?delete=<?php echo $row['id']; ?>"> 
                                            <button class="item" style="color:red;" data-toggle="tooltip" title="Delete Record" id="delete">
                                                 <i class="zmdi zmdi-delete"></i>
                                            </button></a>                                  
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
      <?php include 'footer.php'; ?>
    <!-- END PAGE CONTAINER-->

  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  $('#other_info').hide();
  $(document).ready(function(){
    $(document).on('click','.edit_modal',function(){
        var edit_team = $(this).attr('id');
        $('#edit').modal('show');
            $.ajax({
             url: 'include/edit_team.php',
             type: 'post',
             data:{edit_team:edit_team},
             success:function(data){
                    $("#update_details").html(data);
                    $('#edit').modal('show');
              }
        })
    });
});

$(document).ready(function(){
    $('#members').change(function(){
      var id = $(this).val();
     

      if(id != ""){
        $.ajax({
            url:"member_info.php",
            method:"post",
            data:{id:id},
            dataType:"JSON",
            success:function(data){
                $('#other_info').show();
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);
                $('#address').val(data.address);
                $('#contact').val(data.contact);
                $('#gender').val(data.gender);
                $('#username').val(data.username);
            }
        });
      }
      else{
        alert("Please select from select box");
        $('#other_info').css("display","none");
      }
    })
});
  </script>

</body>

</html>
<!-- end document-->
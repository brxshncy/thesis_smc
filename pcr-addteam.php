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
  <title>Manage Team of Rescuer's</title>

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
<div class="modal fade" id="vehicle" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="scrollmodalLabel">Add Vehicle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
        <div class="modal-body">
                <form action="include/add_vehicle.php" method="POST">
                     <div class="form-group">
                            <label>Vehicle Name</label>
                             <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" placeholder="">
                       </div>
                     <div class="form-group">
                             <label>Plate No.</label>
                             <input type="text" class="form-control" id="plate_no" name="plate_no" placeholder="">
                      </div>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
                                  
                 </form>                          
         </div>
     </div>
  </div>
</div>
     <!-- end of modal addteam  -->

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
                       <label>Vehicle</label>
                    <select name="vehicle_name" class="form-control">
                        <option value=""></option>
                        <?php
                            $qry = "SELECT * FROM vehicle";
                            $result = $conn->query($qry) or trigger_error(mysqli_error($conn)." ".($qry));
                            while($row = mysqli_fetch_assoc($result)){?>
                                <option value="<?php echo $row['vehicle_name'];?>"><?php echo $row['vehicle_name']; ?></option>
                           <?php }?>

  
                    </select>
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
              <h5 class="modal-title" id="scrollmodalLabel">Add Team Members</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                  <div class="modal-body">
                        <form action ="include/addteamdb.php" method= "POST" enctype="multipart/form-data">
                               <div class="form-group">
                                    <label>Members Available</label>
                                    <select class="form-control" id="members" name="members">
                                      <option value=""></option>
                                    <?php
                                        $members = $conn->query("SELECT *, un.id AS un_id, r.id as r_id FROM rescuers r LEFT JOIN unit_name un ON un.id =r.team_unit  WHERE r.team_unit NOT IN (SELECT id FROM unit_name) OR  team_unit = '' OR team_unit = NULL ");
                                        if($members->num_rows > 0){
                                           while($row = $members->fetch_assoc()){
                                          $name = $row['firstname']." ".$row['lastname'];
                                            echo '<option value="'.$row['r_id'].'">'.$name.'</option>';
                                        }
                                        }else{
                                          echo '<option>No members available</option>';
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
                                <div class="form-group mt-4">
                                    <label>Role</label>
                                    <select class="form-control col-md-6" id="role" name="role">
                                    <option value=""></option>
                                    <option value="Treatment Officer">Treatment Officer</option>
                                    <option value="Treatment Officer">Treatment Officer</option>
                                    <option value="Member">Member</option>
                                    </select>
                              </div>
                          </div>
                          

                              <div class="form-group mt-4">
                                    <label>Team Name</label>
                                    <select class="form-control" id="team_name" name="team_name">
                                    <?php
                                        $select_team = $conn->query("SELECT * FROM unit_name");
                                        while($select = $select_team->fetch_assoc()){
                                    ?>  
                                              <option value="<?php echo $select['id']; ?>"><?php echo $select['unit_name'];?></option>
                                            
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
                <nav class="navbar navbar-expend-md bd-default pull-right">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#scrollmodal" data-placement="top" title="Add Team ">
                                <i class="far fa-flag"></i>
                        </button>

                        <button class="btn btn-success btn-sm ml-1" data-toggle="modal" data-target="#addmember" data-placement="top" title="Add Team Member">
                               <i class="fas fa-users"></i>
                        </button>
                        <button class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#vehicle" data-placement="top" title="Add Vehicle">
                               <i class="fas fa-ambulance"></i>
                        </button>
                      </li>
                    </ul>
                  </nav>



<?php                                    

$q = 
    "SELECT t.id,t.unit_name,

    (SELECT DISTINCT CONCAT(sub_r.firstname, ' ', sub_r.lastname) AS name FROM teams sub_tm 

    LEFT JOIN rescuers sub_r ON sub_r.id = sub_tm.rescuers_id WHERE sub_tm.role = 'Treatment Officer' AND t.id = sub_tm.team_id) AS treatment_officer,

    (SELECT DISTINCT CONCAT(sub_r.firstname, ' ', sub_r.lastname) AS name FROM teams sub_tm 

    LEFT JOIN rescuers sub_r ON sub_r.id = sub_tm.rescuers_id WHERE sub_tm.role = 'Transport Officer' AND t.id = sub_tm.team_id) AS transport_officer, 

    (SELECT COUNT(role) FROM teams sub_tm WHERE sub_tm.role = 'Member' AND t.id = sub_tm.team_id) AS members, 
    t.vehicle_name FROM unit_name as t";

$result = $conn->query($q);
$counter = 0;
?>
<div class="table-responsive-md">  
    <table class="table table-bordered">
       <thead class="thead">
          <tr class="table-primary" style="border-color:black;">
              <th>No.</th>
              <th>Team</th>
              <th >Treatment Officer</th>
              <th>Transport Officer</th>
              <th >Vehicle</th>
              <th>Members</th>                             
              <th>Action</th>
          </tr>
       </thead>
<tbody>
 <?php if(mysqli_num_rows($result) > 0) { ?>
  <?php while($row = $result->fetch_object()){
  $counter++;
?>
  <tr class="table-default">
    <td><?php echo $counter;?></td>
    <td><?php echo $row->unit_name;?></td>
    <td><?php echo (isset($row->treatment_officer) && !empty($row->treatment_officer)) ? $row->treatment_officer : 'No assigned'; ?></td>
    <td><?php echo (isset($row->transport_officer) && !empty($row->transport_officer)) ? $row->transport_officer : 'No assigned'; ?></td>
    <td><?php echo $row->vehicle_name;?></td>
    <td><?php echo (isset($row->members) && !empty($row->members)) ? $row->members : 'No Members'; ?></td>
    <td width="" style="text-align:center;">
        <a href="view_member.php?view=<?php echo $row->id;?>">
         <button class="item" style="color:green;" data-toggle="modal" data-target="#" title="View Unit Members" id="add"> <i class="fa fa-users"></i></button>
        </a> |
        <button class="item edit_modal" style="color:blue;" data-toggle="modal" title="Edit Record" id="<?php echo $row->id;?>">
             <i class="fa fa-edit"></i>
        </button>|
        <a href="include/delete_team.php?delete=<?php echo $row->id; ?>"> 
          <button class="item" style="color:red;" data-toggle="tooltip" title="Delete Team" id="delete">
          <i class="zmdi zmdi-delete"></i>
        </button></a> |
        <a href="team_activitylog.php?log=<?php echo $row->id;?>">
        <button class="item" style="color:;" data-toggle="tooltip" title="View Activity Log" id="delete">
           <i class="fas  fa-book text-info"></i>
        </button>  </a>                             
   </td>
  </tr>  
                                    <?php }  ?> 
                                    <?php } else { ?>
                                      <td colspan="7">No data</td>
                                      
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
        $('#other_info').css("display","none");
      }
    })
});
  </script>

</body>

</html>
<!-- end document-->
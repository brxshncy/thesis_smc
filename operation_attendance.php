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
    <title>Rescuer Attendance</title>

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


 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
       <div class="container-fluid">
            <div class="jumbotron" style="background-color: #fff;">
              <div class="row">
                  <div class="col">
                    <h4>Attendance Sheet</h4>
                 </div>
                  <div class="col col-md-4">
                      <h4> Date Today: <?php echo date("M-d-Y"); ?></h4>
                    </div>
              </div>
                <hr>
                <?php if(isset($_SESSION['message'])): ?>
                         <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                         </div>
                         <?php endif ?>
            <div class="row mt-2">
                <div class="col col-md-3">
                   <div class="filters m-b-45">
                      <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                          <select class="js-select2" name="team" id="team">
                               <option value="">All</option>
                                  <?php
                                      $select_team = "SELECT * from unit_name";
                                      $result = $conn->query($select_team);
                                      while($row = mysqli_fetch_assoc($result)){?>
                                    <option value="<?php echo $row['id'];  ?>"><?php echo $row['unit_name']; ?> </option>
                                    <?php }?>
                            </select>
                                <div class="dropDownSelect2"></div>
                              </div>
                    </div>
                  </div>
                   <div class="col col-md-6" >
                      <input class="form-control" type="text" name="search" id="search" placeholder="Search Name..." />
                   </div>
                   
                   <div class="col col-md-3">
                       <a href="view_attendance.php" class="btn btn-success btn-md ">Attendance Report </a>
                   </div>
            </div>
                      <div class="table-responsive-md" style="margin-top:-30px">
                          <form action="include/attendance_crew.php" method="POST">
                            <table class="table table-bordered" id="search_table">
                                <thead class="thead">
                                      <tr class="table-primary">
                                        <td>No.</td>
                                        <td>Name</td>
                                        <td>Team</td>
                                        <td>Action</td>
                                      </tr>
                                </thead>
                                      <tbody>
                                              <?php
                                                  $date_today = date("Y-m-d");
                                                  
                                                  
                                                  $sub_query  = "(SELECT DISTINCT COUNT(id) FROM unit_attendance WHERE rescuer_id = r.id AND date = '$date_today') as attendance_checked"; 
                                                  $sub_query .= ", (SELECT DISTINCT status FROM unit_attendance WHERE rescuer_id= r.id AND date = '$date_today') as attendance_status";
                                                  $query = "SELECT *, t.unit_name AS team, t.id as t_id, r.id as id, $sub_query FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id ORDER BY t.id ASC";

                                                  $result = $conn->query($query);

                                                  $serialnumber = 0;
                                                  $counter=0;
                                                  while($row = mysqli_fetch_assoc($result)){
                                                     $serialnumber++;
                                                     $fullname  = $row['firstname']." ".$row['lastname'];
                                                     $id = $row['id'];
                                                    ?> 
                                                    <tr class="table-default">
                                                      <td><?php echo $serialnumber; ?></td>
                                                      <td><?php echo $fullname?></td>

                                                      <input type="hidden" value="<?php echo $id; ?>" name="fullname[]" id="fullname">
                                                      <td><?php echo (isset($row['team']) && !empty($row['team'])) ? $row['team'] : 'No team' ?></td>
                                                      <input type="hidden" value="<?php echo $row['t_id'];?>" name="team[]" id="team">
                                                      <td width="30%">
                                                      <?php if(!$row["attendance_checked"]) { ?>
                                                      <select name="status[<?php echo  $counter; ?>]" class="form-control" id="status">
                                                          <option value=""></option>
                                                          <option value="Absent">Absent</option>
                                                          <option value="Present">Present</option>
                                                          <option value="Late">Late</option>
                                                      </select>
                                                      <?php } else { ?>
                                                          <span class="font-weight-bold">
                                                            Attendanced Checked : <?php
                                                                if($row['attendance_status'] === 'Present'){
                                                                    echo "<p class='font-weight-bold text-success'> $row[attendance_status] </p>"; 
                                                                }
                                                                else if($row['attendance_status'] ==='Late'){
                                                                    echo "<p class='font-weight-bold text-warning'> $row[attendance_status] </p>";
                                                                }
                                                                else if($row['attendance_status'] === 'Absent'){
                                                                    echo "<p class='font-weight-bold text-danger'> $row[attendance_status] </p>";
                                                                }
                                                            ?> 
                                                            </span>
                                                      <?php } ?>
                                                      </td>
                                                    </tr>
                                                  <?php 
                                                  $counter++;
                                                  ?>
                                             <?php } ?>
                                      </tbody>
                            </table>
                          <br>
                          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
                        </form>
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
        $('#search').keyup(function(){
          var search = $(this).val();
          
            $.ajax({
                url:'include/search_rescuer.php',
                method:'post',
                data:{search:search},
                success:function(data){ 
                  $('#search_table').html(data);
                }
            });
        });

        $('#team').change(function(){
            var id = $(this).val();

          if(typeof id != 'undefined' && id != ''){
                 $.ajax({
              url: 'include/select_team.php',
              method:'post',
              data:{id:id},
              success:function(data){
                $('#search_table').html(data);
              }
            });
          }else{
            location.reload();
          }
         
        });
      });
    </script>
</body>

</html>
<!-- end document-->

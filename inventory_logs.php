<?php 
include 'include/db.php';  
session_start();
?>
<?php include 'logistics/header.php';?>

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
                                <th style="text-align:center;">No.</th>
                                <th style="text-align:center;">Logs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $logs = "SELECT *, s.admin_type AS senderr, ia.id AS id FROM item_accept_request ia LEFT JOIN admin_login s ON ia.sender = s.id";
                                $result = mysqli_query($conn,$logs);
                                $counter = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $sender = $row['senderr'];
                                    $sender_i = ucfirst($sender);
                                    $date = $row['date_accepted'];
                                    $time = $row['time_accepted'];
                                    $date_accept = date('F j, Y', strtotime($date));
                                    $time_accept = date('H:i A',strtotime($time));
                                ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $counter;?></td>
                                <td style="text-align:center;">
                                    <?php echo 
                                "You accepted a <button type='button' title='View' data-placement='top' class='item font-weight-bold text-success request' id=".$id.">Request</button> from".
                                " <span class='text-success font-italic '>".$sender_i."</span> "."on <span class='text-success '>".$date_accept."</span> at<span class= 'text-success '> ".$time_accept?>
                                    
                                </td>
                            </tr>   
                            <?php $counter++; }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="request">
    <div class="modal-dialog modal-lg">
        <form action="include/request_item_accept.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Request Item Details</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body" id="request_items">
                                
                        </div>
                </div>
        </form>
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
      $(document).ready(function(){
        $('.request').click(function(){
            var request = $(this).attr('id');
            $.ajax({
                url: 'logistics_logs.php',
                method: 'post',
                data:{request:request},
                success:function(data){
                    $('#request_items').html(data);
                    $('#request').modal('show');
                }
            });
        })
      })
    </script>
  

</body>

</html>







    
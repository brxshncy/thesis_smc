<?php include 'include/db.php'; ?>
<?php include 'operation/template_header.php'; ?>

   <!--View Modal -->
                    <div class="modal fade" id="pcr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                         
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Patient Care Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id= "pcr_modal" >
                              

                        </div>
                      </div>
                    </div>
                  </div>
            <!-- end View scroll -->

            <!--Submit Modal -->
                    <div class="modal fade" id="pcr_submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                         
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Patient Care Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id= "submit_pcr" >
                              

                        </div>
                      </div>
                    </div>
                  </div>
            <!-- end modal scroll -->

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
                
                     <?php
                        if(isset($_SESSION['success_msg'])): ?>
                            <div class="alert alert-success">
                                <?php 
                                     echo $_SESSION['success_msg'];
                                     unset($_SESSION['success_msg']);
                                ?>
                            </div>
                    <?php endif ?>
                    <?php
                        if(isset($_SESSION['delete_msg'])): ?>
                            <div class="alert alert-danger">
                                <?php 
                                     echo $_SESSION['delete_msg'];
                                     unset($_SESSION['delete_msg']);
                                ?>
                            </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['msg'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                            ?>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['msg-del'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['msg-del'];
                                    unset($_SESSION['msg-del']);
                            ?>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['message'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                    ?>
                <?php endif ?>
            </div>
<div class="jumbotron bg-light">
<div class="table-responsive">   
    <table class="table table-hover table-light table-bordered">
        <thead class="table-primary">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">From</th>
                <th class="text-center">Team</th>
                <th class="text-center">Request</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
           <?php
            $locator = "SELECT pcr.id AS id, un.unit_name AS team, CONCAT(r.firstname,' ',r.lastname) AS sender FROM pcr 
                        LEFT JOIN unit_name un ON un.id = pcr.team 
                        LEFT JOIN rescuers r ON r.id = pcr.sender";
            $counter = 0;
            $result = $conn->query($locator);
            $field_count = $result->field_count;
            if(mysqli_num_rows($result)){
            if($field_count>0){  
            while($row = mysqli_fetch_object($result)){
            $counter ++;
            $id = $row->id;
            $sender = $row->sender;
            $team = $row->team;                                
        ?>
            <tr>
                <td class="text-center"><?php echo $counter; ?></td>
                <td class="text-center"><?php echo $sender; ?></td>
                <td class="text-center"><?php echo(isset($team) && !empty($team) ? $team : 'No Team'  )?></td>
                <td class="text-center">  
                    <button type="button" title="View Details" class="item text-success view_info" id="<?php echo $id; ?>">
                        <i class="fas fa-envelope"></i>
                    </button> 
                </td>
                <td class="text-center">
                        <a href="pcr_edit.php?view=<?php echo $row->id;?>">
                            <button type="button" class="item text-info"> <i class="fas fa-edit"></i></button>
                        </a>
                        <a href="pcr_delete.php?view=<?php echo $row->id;?>">
                            <button type="button" class="item text-danger ml-2"> <i class="zmdi zmdi-delete"></i></button>
                        </a>
                </td>
            </tr>
        <?php } } } ?>
        </tbody>
    </table> 
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
        $('table').DataTable();
      $('.view_info').click(function(){
        var id = $(this).attr('id');
            $.ajax({
                url: "pcr-request-modal.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#pcr_modal').html(data);
                     $('#pcr').modal('show');
                }
            });
      });

      $('.submit_info').click(function(){
            var id = $(this).attr('id');
           $.ajax({
            url: "pcr-submit-modal.php",
            method:"POST",
            data:{id:id},
            success:function(data){
                $('#submit_pcr').html(data);
                $('#pcr_submit').modal('show');
            }
           });
      });
});
</script>

</body>

</html>

<?php include 'include/db.php'; ?>
<?php include 'operation/template_header.php'; ?>

   <!--Edit Modal -->
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
            <!-- end modal scroll -->

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

                <div class="">
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
                                <table class="table table-hover table-light" id="table_search">
                                            <thead class="table-primary">
                                                <th>No.</th>
                                                <th>From</th>
                                                <th>Request</th>
                                                <th>Action</th>
                                            </thead>
                                <tbody>
                                <?php
                                    $locator = "SELECT * FROM pcr";
                                    $counter = 0;
                                    $result = $conn->query($locator);
                                    $field_count = $result->field_count;
                                    if($field_count>0){  
                                        while($row = mysqli_fetch_assoc($result)){
                                            $counter ++;
                                            $id = $row['id'];
                                            

                                ?>
                                <tr>
                                        <td width="5%" class=""><?php echo $counter; ?></td>
                                        <td width="30%" class=""><?php echo $row['dispatched_unit']; ?></td>
                                        <td>
                                            <button type="button"  class="btn btn-success btn-sm view_info" id="<?php echo $id; ?>">
                                                    View Full PCR Details
                                            </button> 
                                        </td>
                                        <td width="30%">
                                            <div class="row">
                                               <a href="pcr_edit.php?view=<?php echo $row['id'];?>"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                               <button type="button" class="btn btn-danger btn-sm ml-2">Delete</button>
                                            </div>
                                        </td>
                            </tr>
                        </tbody>
                             
                                <?php
                                         }
                                    }else{
                                        echo "No pending request";
                                    }
                                ?>
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

    <!-- Main JS-->
    <script src="js/main.js"></script>
   <script>
    
    $(document).ready(function(){
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
});
</script>

</body>

</html>

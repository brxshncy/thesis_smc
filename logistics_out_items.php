<?php 
include 'include/db.php';  
session_start();
if(!isset($_SESSION['username_admin']) || $_SESSION['admin_type'] != 'logistics'){
    $_SESSION['logistics_msg'] = "You must logged in as Logistics Admin First";
    header("location:icdrrmo_login.php");
  }
?>
?>
<?php include 'logistics/header.php';?>

<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">




       <div class="card">
          <div class="card-header">
            <b>Out Items</b>
          </div>
            <div class="card-body">
              <form action="include/items_out.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Reciever Department :</label>
                          <select name="admin_type" id="admin_type" class="form-control" required>
                                  <option value=""></option>
                                  <option value="operation">Operation Section Admin</option>
                                  <option value="communication">Communication Section Admin</option>
                                  <option value="training">Training Section Admin</option>
                                  <option value="logistics">Logistics Section Admin</option>
                          </select>

                        </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-12">
                          <hr>
                      </div>
                    </div>
                
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Item Name</label>
                              <select name="item_name_id" id="select_item" class="form-control" required>
                                  <option value=""></option>
                                  <?php
                                    $qry = "SELECT * FROM items";
                                    $result = $conn->query($qry);
                                    while($row = mysqli_fetch_assoc($result)){
                                        
                                      echo '<option value="'.$row['id'].'">'.$row['item_name'].' </option>';

                                  }
                                  ?>       
                                
                              </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <?php
                          $date = date("F j, Y");
                        ?>
                        <label>Current Date:</label>
                        <input type="text" class="form-control" name="date" id="date" readonly value="<?php echo $date; ?>">
                   </div>
                   <div class="col-md-3">
                      <?php
                          date_default_timezone_set('Asia/Manila');
                          $currentTime  = date("h:i:a");
                      ?>
                      <label>Current Time</label>
                      <input type="text" class="form-control" name="time_now" id="time_now" readonly value="<?php echo $currentTime;?> ">
                   </div>
                   <div id="show_info" class="ml-3">
                       <div class="form-row">
                          <div class="col-md-3">
                              <label class="text-danger"><b>*Item Code</b></label>
                              <input type="text" name="item_code" id="item_code" class="form-control" readonly>
                          </div>
                          <div class="col-md-3">
                              <label class="text-danger"><b>*Item Name</b></label>
                              <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                          </div>
                       </div>
                       <div class="form-row mt-3">
                            <div class="col-md-6">
                                <label class="text-danger"><b>*Item Description</b></label>
                                <input type="text" class="form-control" id="item_description" name="item_description" readonly>
                            </div>
                             <div class="col-md-3 ">
                                <label class="text-danger ml-3"><b>*Total Quantity</b></label>
                                <input type="text" class="form-control ml-3" id="quantity" name="quantity" readonly>
                            </div>
                             <div class="col-md-3 ">
                                <label class="text-danger ml-4"><b>*Unit of measure</b></label>
                                <input type="text" class="form-control ml-4" id="unit_measure" name="unit_measure" readonly>
                            </div>
                        </div>
                        <div class="form-row mt-3 ">
                            <div class="col-md-3">
                                <label>Enter Quantity</label>
                                <input type="text" name="quantity_out" id="allownumericwithoutdecimal" class="form-control" required>
                            </div>
                             <div class="col-md-9">
                                <label>Purpose</label>
                                <input type="text" name="purpose" id="purpose" class="form-control">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                          <div class="col-md-6 text-center">
                              <button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">Submit</button>
                          </div>
                        </div>
                    </div>
              </div>
         </form>





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
      $('#show_info').hide();
        $(document).ready(function(){
            $('#select_item').change(function(){
              var id = $(this).val();

              alert(id);
              if(id != ""){
                 $.ajax({
                      url: "include/items_info.php",
                      method: "post",
                      data:{id:id},
                      dataType: "JSON",
                      success:function(data){
                          $('#show_info').show();
                          $('#item_code').val(data.item_code);
                          $('#item_name').val(data.item_name);
                          $('#item_description').val(data.item_description);
                          $('#quantity').val(data.quantity);
                          $('#unit_measure').val(data.unit_measure);
                      }
                 });
              }
              else{
                $('#show_info').css("display","none");
              }
            })
        });
        $("#allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        })
    </script>
  

</body>

</html>







    
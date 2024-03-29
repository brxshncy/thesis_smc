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
              <h3>Request</h3>
            </div>
          </div>
            <hr>
              <?php
                    if(isset($_SESSION['item_accept'])):?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['item_accept'];
                              unset($_SESSION['item_accept']);
                        ?>
                    </div>
            <?php endif  ?>
             <?php
                    if(isset($_SESSION['not_enough'])):?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['not_enough'];
                              unset($_SESSION['not_enough']);
                        ?>
                    </div>
            <?php endif  ?>
                <div class="row mt-2">
                  <div class="col-sm-12 table-responsive mt-3">
                    <table id="item-list" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">From</th>
                            <th style="text-align:center;">Item Request</th>
                            <th style="text-align:center;">Action</th>
                        </tr>
                      </thead>
                          <tbody>
                              <?php 
                                  $pending_request = "SELECT o.admin_type as admin, CONCAT(r.firstname,' ',r.lastname) as rescuer, i.id as opr_id FROM opr_item_request i 
                                                    LEFT JOIN admin_login o ON o.id = i.sender 
                                                    LEFT JOIN rescuers r ON r.id = i.sender";
                                  $result = $conn->query($pending_request);
                                  $pending_row = mysqli_num_rows($result);
                                  $counter = 0;
                                  if($pending_row > 0 ){
                                    while($row = mysqli_fetch_assoc($result)){
                                      $counter++;
                                      $admin = ucfirst($row['admin'])." Admin";
                                      $rescuer = ucwords($row['rescuer']);
                                      $id = $row['opr_id'];
                                  ?>
                                  <tr>
                                    <td width="5%" style="text-align:center;"><?php echo $counter?></td>
                                     <td style="text-align:center;">
                                     <?php 
                                        if(isset($rescuer) && !empty($rescuer)){
                                            echo $rescuer;
                                        }
                                        else {
                                            echo $admin;
                                        }
                                     ?>
                                      </td>
                                     <td style="text-align:center;"><button type="button" class="btn btn-success request"  data-toggle="tooltip" data-placement="top" id="<?php echo $id;?>"><i class="fas fa-envelope mr-3"></i>View Request</button></td>
                                     <td style="text-align:center;" with="30%">
                                      <a href="logistics_accept_request.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-primary btn-sm">Accept</button></a>
                                      <a href="logistics_reject_request.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-danger btn-sm ml-2">Reject</button></a>
                                      </td>
                                  </tr>
                              <?php     }
                                  }else{
                                      echo '<td colspan="4"> No Pending Request</td>';
                                  }
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
<?php include 'logistics/footer_l.php'; ?>








    
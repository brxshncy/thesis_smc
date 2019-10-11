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
      						  	<b> In Items</b>
      						 </div>
          							<div class="card-body">
          								<?php
          									if(isset($_SESSION['msg'])):?>
          										<div class="alert alert-success">
          											<?php
          												echo $_SESSION['msg'];
          												unset($_SESSION['msg']);
          											?>
          										</div>

          									<?php endif?>
          									<?php
          									if(isset($_SESSION['update'])):?>
          										<div class="alert alert-info">
          											<?php
          												echo $_SESSION['update'];
          												unset($_SESSION['update']);
          											?>
          										</div>

          									<?php endif?>
          								
          								<div class="row">
          									<div class="col-md-6">
          										
          									</div>

                            <?php if(isset($_POST['del_items'])):?>
                            <div class="alert alert-danger mt-2">
                              <?php echo $_SESSION['del_items'];
                                    unset($_SESSION['del_items']);
                              ?>
                            </div>
                          <?php endif?>
          									<div class="col-md-6">
          										<button type="button" class="btn btn-success btn-xs pull-right" id="add" data-toggle="modal" data-target="#add_item">
          											<i class="fas fa-plus-circle"></i> Add Item
          										</button>
          									</div>
          									<div class="col-sm-12 table-responsive mt-4">
          										<table id="item_list" class="table table-bordered table-striped">
          											<thead>
          												<tr>
          													
          													<th>Item Name</th>
          													<th>Item Description</th>
          													<th>Quantity</th>
          													<th>Unit Measure</th>
          													<th>Action</th>
          												</tr>
          											</thead>
                                    <tbody>
                                     <?php
                                       $qry = "SELECT * FROM items";
                                       $result = $conn->query($qry);
                                       $row_data = mysqli_num_rows($result);
                                       if($row_data > 0){
                                       while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                      
                                      <td width=""><?php echo $row['item_name']; ?></td>
                                      <td width=""><?php echo $row['item_description']; ?></td>
                                      <td width=""><?php echo $row['quantity']; ?></td>
                                      <td width=""><?php echo $row['unit_measure']; ?></td>
                                      <td width="" style="text-align:center;">
                                      <button class="item edit_button" style="color:blue;" data-toggle="tooltip" data-placement="top" title="Edit" id="<?php echo $row['id'];?>">
                                        <i class="fas fa-edit (alias) "></i></button> |
                                         <button class="item del_button" style="color:blue;" data-toggle="tooltip" data-placement="top" title="Delete" id="<?php echo $row['id'];?>">
                                        <i class="zmdi zmdi-delete text-danger"></i> 
                                      </td>
                                     </tr>
                                                    <?php }}else{
                                                            echo '<td colspan="5">No item available</td>';
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
</div>



                             <!-- Modal -->
<div class="modal fade" id="add_item">
    <div class="modal-dialog modal-lg">
        <form action="include/items.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Add Item</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="text-danger">*Item Name</label>
                                    <input type="text" name="item_name" id="item_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-danger">*Item Description</label>
                                    <textarea name="item_description" id="item_description" class="form-control"></textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>*Quantity</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>*Unit of Measure</label>
                                        <input type="text" name="unit_measure" id="unit_measure" class="form-control">
                                    </div>
                                </div>
                         </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </div>
                </div>
        </form>
    </div>
</div>

         			 <!-- Modal -->

         			  <!-- Edit Modal -->
<div class="modal fade" id="edit_modal">
    <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">  Edit Item</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                       <div class="modal-body" id= "update_details" >
                              

                        </div>
                </div>
    </div>
</div>
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Warning!</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                       <div class="modal-body" id= "del_items" >
                              <h4>Are you sure you want to delete this item?</h4>
                        </div>
                     
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" id="delete_item" name="delete">Delete</button>
                        </div>
                </div>
    </div>
</div>

         			 <!-- Modal -->


<?php include 'footer.php';?>
<?php include 'logistics/footer_l.php'; ?>








    
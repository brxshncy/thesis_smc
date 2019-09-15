<?php 
include 'include/db.php';  
session_start();
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
          								
          								<div class="row">
          									<div class="col-md-6">
          										<input type="text" class="form-control" placeholder="Search">
          									</div>
          									<div class="col-md-6">
          										<button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#add_item">
          											<i class="fas fa-plus-circle"></i> Add Item
          										</button>
          									</div>
          									<div class="col-sm-12 table-responsive mt-4">
          										<table id="item_list" class="table table-bordered table-striped">
          											<thead>
          												<tr>
          													<th>Item Code</th>
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
                                                    		while($row = mysqli_fetch_assoc($result)){
                                                    	?>
                                                        <tr>
                                                            <td width=""><p style="font-family:'Arial','sans-serif' "><?php echo $row['item_code']; ?></p></td>
                                                            <td width=""><?php echo $row['item_name']; ?></td>
                                                            <td width=""><?php echo $row['item_description']; ?></td>
                                                            <td width=""><?php echo $row['quantity']; ?></td>
                                                            <td width=""><?php echo $row['unit_measure']; ?></td>
                                                            <td width="">
                                                                <i class="fas fa-edit (alias) text-primary ml-4"></i> | <i class="zmdi zmdi-delete text-danger"></i> 
                                                            </td>
                                                        </tr>
                                                    <?php }?>
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
                        <h5 class="modal-title">  Add Item</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="text-danger">*Item Code</label>
                                    <input type="text" name="item_code" id="item_code" class="form-control">
                                </div>
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


<?php include 'footer.php';?>
<?php include 'logistics/footer_l.php'; ?>








    
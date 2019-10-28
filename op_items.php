<?php
require ('include/db.php');
if(isset($_POST['view'])){
	$id = $_POST['view'];
	$qry ="SELECT * FROM item_accept_request WHERE id = '$id'";
	$result = $conn->query($qry);
	while($row = mysqli_fetch_assoc($result)){ ?>
		<div class="form-row mt-4" style="margin-top:20px;">
            <div class="col col-md-4">
                <label class="text-danger">*Item Name</label>
                <input type="text" name="item_name" id="item_name" value="<?php echo $row['item_name']?>" class="form-control" readonly="">
            </div>
            <div class="col col-md-6 ml-3">
                <label class="text-danger">*Item Description</label>
                <input type="text" name="item_description" id="item_description" value="<?php echo $row['item_name']?>" class="form-control" readonly="">
            </div>
         </div>
        <div class="form-row mt-2" style="margin-top:20px;">
            <div class="col col-md-4">
                <label class="text-danger">*Quantity</label>
                <input type="text" name="quantity" id="quantity"  value="<?php echo $row['quantity']?>"class="form-control" style="margin-top:-5px;" readonly="">
             </div>
            <div class="col col-md-4 ml-3">
                <label class="text-danger">*Unit of Measure</label>
                <input type="text" name="unit_measure" id="unit_measure"  value="<?php echo $row['unit_measure']?>" class="form-control" style="margin-top:-5px;" readonly="">
            </div>
        </div>
<?php
	}
}

?>
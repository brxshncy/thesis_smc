<?php
include 'db.php';
session_start();
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$qry = "SELECT * FROM  items WHERE id = '$id' ";
		$result = $conn->query($qry);
		while($row = mysqli_fetch_array($result)){
			$id1 = $row['id'];
			$item_name = $row['item_name'];
			$item_description = $row['item_description'];
			$quantity = $row['quantity'];
			$unit_measure = $row['unit_measure'];

		}


	}

?>
<form action="include/update_items.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id1; ?>">
        <div class="form-group">
             <label class="text-danger">*Item Name</label>
             <input type="text" name="item_name" id="item_name" value="<?php echo $item_name; ?>" class="form-control">
        </div>
        <div class="form-group">
             <label class="text-danger">*Item Description</label>
             <textarea name="item_description" id="item_description"  class="form-control"> <?php echo $item_description; ?></textarea>
         </div>
        <div class="row form-group">
            <div class="col-md-6">
                <label>*Quantity</label>
                <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label>*Unit of Measure</label>
                <input type="text" name="unit_measure" id="unit_measure" value="<?php echo $unit_measure; ?>" class="form-control">
            </div>
        </div>
         <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" name="update">Update</button>
                        </div>
                  
	</form>
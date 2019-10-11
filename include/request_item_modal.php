<?php
require ('db.php');

	if(isset($_POST['request'])){
		$request = $_POST['request'];

		$request_item = "SELECT * FROM opr_item_request WHERE id ='$request'";
		$result = $conn->query($request_item);
		while($row = mysqli_fetch_assoc($result)){?>

			<div class="form-group">
                                    <label class="text-danger">*Item Name</label>
                                    <input type="text" name="item_name" id="item_name" value="<?php echo $row['item_name'] ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="text-danger">*Item Description</label>
                                     <input type="text" name="item_name" id="item_name" value="<?php echo $row['item_description'] ?>" class="form-control" readonly>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>*Quantity</label>
                                        <input type="text" name="quantity" id="quantity" value="<?php echo $row['quantity'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>*Unit of Measure</label>
                                        <input type="text" name="unit_measure" id="unit_measure" value="<?php echo $row['unit_measure'] ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                 <div class="row form-group">
                                    <div class="col-md-3">
                                        <label>Entered Quantity</label>
                                        <input type="text" name="quantity" id="quantity" value="<?php echo $row['enter_quantity'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-9">
                                        <label>Purpose</label>
                                        <input type="text" name="unit_measure" id="unit_measure" value="<?php echo $row['purpose'] ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>Date submitted</label>
                                        <input type="text" name="quantity" id="quantity" value="<?php echo $row['date'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Time</label>
                                        <input type="text" name="unit_measure" id="unit_measure" value="<?php echo $row['time'] ?>" class="form-control" readonly>
                                    </div>
                                </div>
<?php
		}
	}
?>
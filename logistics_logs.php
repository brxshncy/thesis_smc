<?php
require ('include/db.php');

if(isset($_POST['request'])){
	$id = $_POST['request'];

	$request_item = "SELECT * FROM item_accept_request WHERE id ='$id'";
	$result = $conn->query($request_item);
	while($row = mysqli_fetch_assoc($result)){?>
	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Item Name:</label>
			<input type="text" class="form-control" value="<?php  echo $row['item_name'];?>" readonly>
		</div>
		
	</div>
	<div class="form-row">
		<div class="form-group col-md-9">
			<label>Item Description:</label>
			<input type="text" class="form-control" value="<?php  echo $row['item_description'];?>" readonly>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label>Original Quantity:</label>
			<input type="text" class="form-control" value="<?php  echo $row['quantity'];?>" readonly>
		</div>
		<div class="form-group col-md-6">
			<label>Unit Measure:</label>
			<input type="text" class="form-control" value="<?php  echo $row['unit_measure'];?>" readonly>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label>Quantity Release:</label>
			<input type="text" class="form-control" value="<?php  echo $row['enter_quantity'];?>" readonly>
		</div>
		<div class="form-group col-md-9">
			<label>Purpose:</label>
			<input type="text" class="form-control" value="<?php  echo $row['purpose'];?>" readonly>
		</div>
	</div>
<?php
	}
}

?>

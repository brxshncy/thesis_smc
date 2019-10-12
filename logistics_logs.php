<?php
require ('include/db.php');

if(isset($_POST['request'])){
	$id = $_POST['request'];

	$request_item = "SELECT * FROM item_accept_request WHERE id ='$id'";
	$result = $conn->query($request_item);
	while($row = mysqli_fetch_assoc($result)){?>

		<div class="form-group">
			<label>Item Name:</label>
			<input type="text" class="" value="<?php  echo $row['item_name'];?>">
<?php
	}
}

?>

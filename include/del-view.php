
<?php
include 'db.php';
global $conn;

	if(isset($_POST['del_id'])){
		$del_id = $_POST['del_id'];
		$delView = "SELECT * FROM pcr WHERE id ='$del_id' ";
		$result = mysqli_query($conn,$delView);

		while($row = mysqli_fetch_array($result)){
			$id= $row['id'];
			$name=$row['firstname'];
		}
	}

?>
<input type="hidden" name="del_id" value="<?php echo $id; ?>">
<div class="form-group">
	<label>Name: value= "<?php echo $name; ?>" </label>
	</div>
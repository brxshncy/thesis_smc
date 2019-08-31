<?php include 'include/db.php'; 
global $conn;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	body{
		margin:auto;
	}
	</style>
<body>
			<select name="name" id="name">
					<?php
						$sql = $conn->query("SELECT * FROM rescuers");
						while($row = mysqli_fetch_assoc($sql)){
							?>
							
									<option value="<?php echo $row['id'];?>"><?php echo $row['firstname'];?></option>
						<?php } ?>
			</select>	
			<br>
			<label>Contact</label>
			<input type="text"  name="contact" id="contact" value="<?php echo $row['contact']; ?>">
			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>

		$(document).ready(function(){
			$('#name').change(function(){
				var select = $('option:selected',this).val();	
				alert(hey);
			});
		});
			
		
	</script>
</body>
</html>
<?php include('include/db.php'); ?> 
<!DOCTYPE html>
<html>
<head>
	<title>JSON-AJAX</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php  
			$select = "SELECT * FROM rescuers";
			$query = $conn->query($select);
		?>
	<select name="members" id="members" style="text-align: center;">
		<option value="">Select Members</option>
		<?php
			while($row = mysqli_fetch_assoc($query)){
				$name = $row['firstname']." ".$row['lastname'];
				echo '<option value="'.$row['id'].'">' .$name. '</option>';
			}
		?>
	</select>
	<div class="details">
		<label>Address</label>
		<input type="text" name="address" id="address" readonly="">
		<br>
		<label>Gender</label>
		<input type="text" name="gender" id="gender" readonly="">
		<br>
		<label>Contact</label>
		<input type="text" name="contact" id="contact" readonly="">
		<br>
		<label>Username</label>
		<input type="text" name="username" id="username" readonly="">
	</div>
</body>
<script tpye="text/javscript">
	$(document).ready(function(){
		alert("ready");
		$('#members').change(function(){
			var id = $(this).val();
			
			if(id != ""){
				$.ajax({
					url:"selected.php",
					method:"post",
					data:{id:id},
					dataType:"JSON",
					success:function(data){
							$('.details').css("display","block");
							$('#address').val(data.address);
							$('#gender').val(data.gender);
							$('#contact').val(data.contact);
							$('#username').val(data.username);
					}
				});
			}
			else{
				alert("Please select from select box");
				$('.details').css("display","none");
			}
		});
	});
	</script>
</html>
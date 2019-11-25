<html>


<body>
	<form action="testdb.php" method="post">
		<select name="test">
			<option value=""></option>
			<?php 
				require('include/db.php');
				$ge = "SELECT * FROM baranggay_responses";
				$result = $conn->query($ge) or trigger_error(mysqli_error($conn)." ".$ge);
				while($row = mysqli_fetch_assoc($result)){?>
					<option value="<?php  echo $row['baranggay_name'] ?>"><?php echo $row['baranggay_name'] ?></option>
			<?php
				}
			?>
		</select>
		<input type="submit">
</body>

</html>
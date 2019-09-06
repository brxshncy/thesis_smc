<?php
include 'include/db.php';
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$query = "SELECT * FROM locatorslip_request WHERE id = '$id' ";
	$result = $conn->query($query);
	while($row = mysqli_fetch_array($result)){?>

		<p><b>Details</b></p>
		<p>Destination:<?php echo $row['destination']; ?> </p>
		<p>Purpose: <?php echo $row['purpose']; ?> </p>
		<p>Date: <?php echo $row['date']; ?> </p>
		<p>Time: <?php echo $row['time']; ?> </p>
		<p>Time Return:<?php echo $row['time_return']; ?>  </p>
<?php
	}
}
?>
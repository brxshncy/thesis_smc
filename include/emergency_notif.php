<?php 
require ('db.php');
$output = '';
$notif = "SELECT * FROM emergency_call WHERE notification = 0 ORDER BY id DESC";
$notif_run = $conn->query($notif) OR trigger_error(mysqli_error($conn)." ".$notif);
if(mysqli_num_rows($notif_run) > 0){
while($row = mysqli_fetch_assoc($notif_run))
{
	$output = $row['id'];
}
$update_notif = "UPDATE emergency_call SET notification = 1 WHERE notification = 0";
$update_run = $conn->query($update_notif) OR trigger_error(mysqli_error($conn)." ".$update_notif);
echo $output;
}

?>
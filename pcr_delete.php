<?php
session_start();
include 'include/db.php';

	if(isset($_GET['view'])){
		$id = $_GET['view'];

		$delete_pcr = "DELETE FROM pcr WHERE id = '$id'";
		$result = $conn->query($delete_pcr) or trigger_error(mysqli_error($conn)." ".$delete_pcr);

		if($result){
			$_SESSION['delete_msg'] = "PCR record succesfully deleted from database";
			header("location:pcr-list.php");
		}
	}
?>
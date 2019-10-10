
<?php
//SESSION START
session_start();
//REQUIRE DB
require "db.php";

//IF DELETE IS CLIKED
if(isset($_GET['delete'])){	
	$id = $_GET['delete'];

	$query = "SELECT rescuers_id FROM teams WHERE id = $id";
	$result = $conn->query($query);

	if($result->num_rows > 1) { //dapat result is isa lang talaga
		$_SESSION['message'] = "Result must be unique or only 1.";
		$_SESSION['msg_type'] = "danger";
		header("location:../pcr-addteam.php");
		exit; //to make sure talaga di mag tuloy yung mga code execution pababa parang spaghetti pabababa pababab ng pababa
	}

	if($result->num_rows == 0){ //pag walang result
		$_SESSION['message'] = "No result found.";
		$_SESSION['msg_type'] = "warning";
		header("location:../pcr-addteam.php");
		exit;
	}

	//get the rescuers_id first
	$row = $result->fetch_object();
	$rescuers_team_id = (isset($row->rescuers_id)) ? $row->rescuers_id : null;
	//end

	//check if may error sa query
	if(!$rescuers_team_id){
		$_SESSION['message'] = "No reference of member found.";
		$_SESSION['msg_type'] = "warning";
		header("location:../pcr-addteam.php");
		exit;
	}
	//end

	
	$delete = "DELETE FROM teams WHERE id = $id"; //delete query

	if(!$conn->query($delete)){
		$_SESSION['message'] = "Failed to remove the member";
		$_SESSION['msg_type'] = "warning";
		header("location:../pcr-addteam.php");
		exit;
	}

	$update = "UPDATE rescuers SET team_unit = \"\" WHERE id = $rescuers_team_id";

	if(!$conn->query($update)){
		$_SESSION['message'] = "Member has been removed. Failed to update Member information.";
		$_SESSION['msg_type'] = "danger";
		header("location:../pcr-addteam.php");
		exit;
	}
	
	//tatakbo sisigaw ang message sa session mo.
	$_SESSION['message'] = "Member has been removed";
	$_SESSION['msg_type'] = "danger";
	header("location:../pcr-addteam.php");
	exit;
}
?>


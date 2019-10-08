<?php
include "include/db.php";

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$select_team = "SELECT un.unit_name as unit_name,(SELECT DISTINCT CONCAT(r.firstname,' ',r.lastname) as name FROM teams t LEFT JOIN rescuers r ON t.rescuers_id = r.id WHERE t.role = 'Transport Officer' AND un.id = t.team_id) as transport_officer,(SELECT DISTINCT CONCAT(r.firstname,' ',r.lastname) as name FROM teams t LEFT JOIN rescuers r ON t.rescuers_id = r.id WHERE t.role = 'Treatment Officer' AND un.id = t.team_id) as treatment_officer FROM unit_name un WHERE un.id = '$id' ";
	$result = $conn->query($select_team);
	while($row = mysqli_fetch_object($result)){
		$data['unit_name'] = $row->unit_name;
		$data['transport_officer'] = $row->transport_officer;
		$data['treatment_officer'] = $row->treatment_officer;
	}
	echo json_encode($data);
}

?>
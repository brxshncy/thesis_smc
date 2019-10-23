<?php
require('db.php');
session_start();
$outpt = '';
$serialnumber = '';


	if(isset($_POST['id'])){
     $date_today = date("Y-m-d");
		$id = $_POST['id'];
    $sub_query  = "(SELECT DISTINCT COUNT(id) FROM unit_attendance WHERE rescuer_id = r.id AND date = '$date_today') as attendance_checked"; 
    $sub_query .= ", (SELECT DISTINCT status FROM unit_attendance WHERE rescuer_id= r.id AND date = '$date_today') as attendance_status";
		$select_team = "SELECT *, t.unit_name AS team, r.id as id, t.id as team_id, $sub_query  FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id WHERE t.id = '$id'";
		$result = $conn->query($select_team) or trigger_error(mysqli_error($conn)." ".$select_team);
		$counter = 0;
	}


if($result->num_rows>0){
$output  = "<table class='table table-bordered' id='search_table'>";
$output .= "<thead class='thead'>";
$output .= "<tr class='table-primary'>";
$output .= "<td>No.</td>";
$output .= "<td>Name</td>";
$output .= "<td>Team</td>";
$output .= "<td>Action</td>";
$output .= "</tr>";
$output .= "</thead>";
$output .= "<tbody>";

    while($row = mysqli_fetch_assoc($result)){
        $serialnumber++;
        $fullname = $row['firstname']." ".$row['lastname'];
        $id = $row['id'];

$output .= "<tr class = 'table-default'>";
$output .= "<td>".$serialnumber."</td>";
$output .= "<td>".$fullname."</td>";
$output .= "<input type='hidden' value=".$id." name='fullname[]' id='fullname'>";
$output .= "<td>".$row['team']."</td>";
$output .= "<input type='hidden' value=".$row['team_id']." name='contact[]' id='contact'>";
$output .= "<td width='30%'>";
$output .= ".!$row['attendance_checked']." ?;
$output .= <select name='status[$counter]' class='form-contro'l id='status'>
$output .= <option value=''></option>
$output .= <option value='Absent'>Absent</option>
$output .= <option value='Present'>Present</option>
$output .= <option value='Late'>Late</option>
$output .= </select> '
$output .=<span class='font-weight-bold'>
$output .=Attendanced Checked : 
$output .=if(".$row['attendance_status']." === 'Present'){
$output .=echo '<p class='font-weight-bold text-success'> ".$row['attendance_status']." </p>'; 
$output .=}
$output .=else if(".$row['attendance_status']." ==='Late'){
$output .=echo '<p class='font-weight-bold text-warning'> ".$row['attendance_status']."</p>';
$output .=}
$output .=else if(".$row['attendance_status']." === 'Absent'){
$output .=echo '<p class='font-weight-bold text-danger'> ".$row['attendance_status']." </p>';                                                                   
$output .=</span>           
$output .=</td>
$output .=</tr>


                   	";
                   	 $counter++;
                   }
                  
                   $output .= "</tbody>";
                   echo $output;
	}else{
		echo "No data found";
	}
?>
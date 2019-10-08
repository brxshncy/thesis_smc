<?php
require('db.php');
session_start();
$outpt = '';
$serialnumber = '';


	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$select_team = "SELECT *, t.unit_name AS team, r.id as id, t.id as team_id  FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id WHERE t.id = '$id'";
		$result = $conn->query($select_team) or trigger_error(mysqli_error($conn)." ".$select_team);
		$counter = 0;
	}
	if($result->num_rows>0){
		$output = " <table class='table table-bordered' id='search_table'>
                                <thead class='thead'>
                                      <tr class='table-primary'>
                                        <td>No.</td>
                                        <td>Name</td>
                                        <td>Team</td>
                                        <td>Action</td>
                                      </tr>
                                </thead>
                                      <tbody>";
                   while($row = mysqli_fetch_assoc($result)){
                   	$serialnumber++;
                   	$fullname = $row['firstname']." ".$row['lastname'];
                   	$id = $row['id'];
                   	$output .= "
                   	  <tr class = 'table-default'>
                <td>".$serialnumber."</td>
                <td>" .$fullname."</td>
                <input type='hidden' value=".$id." name='fullname[]' id='fullname'>
                <td>".$row['team']."</td>
                <input type='hidden' value=".$row['team_id']." name='contact[]' id='contact'>
                 <td width='30%'>
                <select name='status[$counter]' class='form-control'>
                                                          <option value=''></option>
                                                          <option value='Absent'>Absent</option>
                                                          <option value='Present'>Present</option>
                                                          <option value='Late'>Late</option>
                                                      </select>
                                                      </td>
                </tr>


                   	";
                   	 $counter++;
                   }
                  
                   $output .= "</tbody>";
                   echo $output;
	}else{
		echo "No data found";
	}
?>
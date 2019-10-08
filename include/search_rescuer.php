<?php
include 'db.php';
$output = '';
$serialnumber = 0;
$counter = 0;
ini_set('display_errors',1);
error_reporting(E_ALL);

if(isset($_POST['search'])){
	$search = $_POST['search'];
	/*$qry = "SELECT * FROM rescuers WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";*/
  $qry =  "SELECT *, t.unit_name as team FROM rescuers r LEFT JOIN  unit_name t ON t.id = r.team_unit WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR t.unit_name LIKE '%$search%'";
	$result = mysqli_query($conn,$qry) or trigger_error(mysqli_error($conn)." ".$qry);
}
if($result->num_rows>0){
	$output .= " <table class='table table-bordered' id='search_table'>
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
         	$counter ++;
                $fullname  = $row['firstname']." ".$row['lastname'];

        $output .= "
        <tr class = 'table-default'>
                <td>".$serialnumber."</td>
                <td>" .$fullname."</td>
                <input type='hidden' value=".$fullname." name='fullname[]' id='fullname'>
                <td>".$row['team']."</td>
                <input type='hidden' value=".$row['contact']." name='contact[]' id='contact'>
                 <td width='30%'>
                <select name='status' class='form-control'>
                                                          <option value=''></option>
                                                          <option value='Absent'>Absent</option>
                                                          <option value='Present'>Present</option>
                                                          <option value='Late'>Late</option>
                                                      </select>
                                                      </td>
                </tr>
        ";
  }
$output .= "</tbody>";
echo $output;
}
else{
	echo "No data found";
}
?>

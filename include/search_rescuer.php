<?php
include 'db.php';
$output = '';
$serialnumber = 0;
$counter = 0;
ini_set('display_errors',1);
error_reporting(E_ALL);

if(isset($_POST['search'])){
	$search = $_POST['search'];
	$qry = "SELECT * FROM rescuers WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";
	$result = mysqli_query($conn,$qry) or trigger_error(mysqli_error($conn)." ".$qry);
}
if($result->num_rows>0){
	$output .= " <table class='table table-bordered' id='search_table'>
                                <thead class='thead'>
                                      <tr class='table-primary'>
                                        <td>No.</td>
                                        <td>Name</td>
                                        <td>Contact</td>
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
                <td>".$row['contact']."</td>
                <input type='hidden' value=".$row['contact']." name='contact[]' id='contact'>
                <td width='30%'>
                <div class='form-check form-check-inline'>
                <input class='form-check-input 'type='radio' name='status[".$counter."]' id='status' value='Present'>
                <label class='form-check-label text-success'for='Present'>Present</label>
                </div>
                <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='status[".$counter."]' id='status' value='Absent'>
                <label class='form-check-label text-danger'for='Absent'> Absent </label>
                </div>
                <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='status[".$counter."]'  id='status' value='Late'>
                <label class='form-check-label text-warning' for='Late'>Late</label>
                </div>
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

<?php

include 'db.php';
$output = "";
		
if(isset($_POST['search'])){
	$search = $_POST['search'];
	$searc_date = date("Y-m-d",strtotime($search));
		$qry = "SELECT * FROM unit_attendance WHERE date LIKE '{$searc_date}%' ";
		$result = $conn->query($qry);
		
}
if($result->num_rows>0){
	$output = " 
	<thead class='thead'>
            <tr class='table-primary'>
                <td>No.</td>
                <td>Dates</td>
                 <td>Show Attendance</td>
            </tr>
        </thead>
     <tbody>";
$date = "SELECT DISTINCT date FROM unit_attendance";
$query_date = $conn->query($date);
$serialnumber = 0;
while($row = mysqli_fetch_assoc($query_date)){
	$date_search = date("M d 20y",strtotime($row['date']));
	$serialnumber ++;
	$output .= "
		<tr class='table-default'>
             <td>  $serialnumber </td>
             <td width='60%'> ".$date_search." </td>
             <td>                                 
             <input type='hidden' value=".$row['date']." name='date' id='date'>
             <input type='submit'  name ='submit'  class='btn btn-primary' value='Show Attendance'>
             </td>
         </tr>
	";
		}
		$output .= "</tbody>";
		echo $output;
}
else{
	echo "Date not found";
}


?>
<?php

include 'db.php';

 $query = "SELECT unit_name.unit_name as unit_name, unit_respondent.fullname as name 
 FROM unit_name, unit_respondent WHERE unit_name.unit_name = unit_respondent.unit_name 
 ";
 $result = $conn->query($query);



if($result->num_rows) {
 	while($row = $result->fetch_object()){
 		echo "{$row->name} ({$row->unit_name}) <br>";
 	}		
}else{
	echo "No results";
}
						
<?php
include 'db.php';
$output = '';
ini_set('display_errors',1);
error_reporting(E_ALL);

if(isset($_POST['search'])){
	$search = $_POST['search'];
	$qry = "SELECT * FROM rescuers WHERE firstname LIKE '%$search%' OR lastname '%$search%'";
	$result = mysqli_query($conn,$qry) or trigger_error(mysqli_error($conn)." ".$qry);
	var_dump($result);
}
if($result->num_rows>0){
	$output = " <table class='table table-bordered' id='search_table'>
                                <thead class='thead'>
                                      <tr class='table-primary'>
                                        <td>No.</td>
                                        <td>Name</td>
                                        <td>Contact</td>
                                        <td>Action</td>
                                      </tr>
                                </thead>
                                      <tbody>";

}
?>

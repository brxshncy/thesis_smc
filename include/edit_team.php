<?php
include 'db.php';
global $conn;

if(isset($_POST['edit_team'])){
	$id = $_POST['edit_team'];

	$fetch = "SELECT * FROM unit_name WHERE id = '$id' ";
	$result = mysqli_query($conn,$fetch);
	while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$unit_name = $row['unit_name'];
			$vehicle_name = $row['vehicle_name'];
			$transport_officer = $row['transport_officer'];
			$treatment_officer = $row['treatment_officer'];
	}
}

?>

<form action="include/update-respondent.php" method="POST">
                     <div class="form-group">
                     	<input type="hidden" id="id" name="id" value="<?php echo $id?>">
                            <label>Team Unit's Name</label>
                             <input type="text" class="form-control" id="unit_name" name="unit_name" value="<?php echo $unit_name;?>">
                       </div>
                     <div class="form-group">
                             <label> Vehicle Name</label>
                             <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" value="<?php echo $vehicle_name;?>">
                      </div>
                      <div class="form-group">
                              <label>Assign Transport Officer</label>
                              <input type="text" class="form-control" id="transport_officer" name="transport_officer"value="<?php echo $transport_officer;?>">
                      </div>
                      <div class="form-group">
                               <label>Assign Treatment Officer</label>
                               <input type="text" class="form-control" id="treatment_officer" name="treatment_officer" value="<?php echo $treatment_officer;?>">
                     </div> 
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
                                  
                 </form>  
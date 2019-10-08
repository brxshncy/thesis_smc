<?php
include 'db.php';
global $conn;

if(isset($_POST['edit_team'])){
	$id = $_POST['edit_team'];

	$fetch = "SELECT un.*,(SELECT DISTINCT CONCAT(r.firstname,' ',r.lastname) as name FROM teams t LEFT JOIN rescuers r ON r.id = t.rescuers_id WHERE t.role = 'Transport Officer' AND un.id = t.team_id) as transport_officer, (SELECT DISTINCT CONCAT (r.firstname,' ',r.lastname) AS name FROM teams t LEFT JOIN rescuers r ON r.id = t.rescuers_id WHERE t.role = 'Treatment Officer' AND un.id = t.team_id) AS treatment_officer  FROM unit_name un WHERE un.id = '$id' ";
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
                      <label>Vehicle</label>
                      <select name="vehicle_name" class="form-control" id="vehicle">
                        <option value=""></option>
                            <?php
                            $qry = "SELECT * FROM vehicle";
                            $result = $conn->query($qry) or trigger_error(mysqli_error($conn)." ".($qry));
                            while($row = mysqli_fetch_assoc($result)){?>
                                <option value="<?php echo $row['vehicle_name'];?>"><?php echo $row['vehicle_name']; ?></option>
                           <?php }?>
                          </select>
                      </div>
                      <div class="form-group">
                              <label>Assign Transport Officer</label>
                              <input type="text" value="<?php echo (isset($transport_officer) && !empty($transport_officer)) ? $transport_officer : 'No assigned'?>" class="form-control" readonly="">
                      </div>
                      <div class="form-group">
                               <label>Assign Treatment Officer</label>
                                 <input type="text" value="<?php echo (isset($treatment_officer) && !empty($treatment_officer)) ? $treatment_officer : 'No assigned' ?>" class="form-control" readonly="">
                     </div> 
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
                                  
                 </form>  
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
                              <select name="transport_officer" id="transport_officer" class="form-control">
                                <option value=""></option>
                                <?php
                                  $qry = $conn->query("SELECT * FROM rescuers");
                                  while($row = mysqli_fetch_assoc($qry)){
                                    $name = $row ['firstname']." ".$row['lastname'];
                                    echo '<option value = "'.$name.'"> '.$name.' </option>';
                                  }
                                ?>
                              </select>
                      </div>
                      <div class="form-group">
                               <label>Assign Treatment Officer</label>
                                <select name="treatment_officer" id="treatment_officer" class="form-control">
                                <option value=""></option>
                                <?php
                                  $qry1 = $conn->query("SELECT * FROM rescuers");
                                  while($row = mysqli_fetch_assoc($qry1)){
                                    $name = $row ['firstname']." ".$row['lastname'];
                                    echo '<option value = "'.$name.'"> '.$name.' </option>';
                                  }
                                ?>
                              </select>
                     </div> 
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
                                  
                 </form>  
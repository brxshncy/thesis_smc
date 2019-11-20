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
      $time_in = $row['time_in'];
      $time_out = $row['time_out'];
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
            <option value="<?php echo $row['id'];?>"> <?php echo $row['vehicle_name'] ?> </option>
          <?php }?>
      </select>
  </div>
  <div class="form-row mb-2">
    <div class="col col-md-6">
        <div class="input-group date" id="edit_in">
          <input type="text" placeholder="Select Time In" class="form-control datetimepicker-input" value="<?php echo $time_in ?>" data-target="#edit_in" name="edit_in" required="">
          <div class="input-group-append" data-target="#edit_in" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
          </div>
        </div>
    </div>
    <div class="col col-md-6">
      <div class="input-group date" id="edit_out" data-target-input="nearest">
        <input type="text" placeholder="Select Time Out" class="form-control datetimepicker-input" value="<?php echo $time_out ?>" data-target="#edit_out" name="edit_out" required="">
          <div class="input-group-append" data-target="#edit_out" data-toggle="datetimepicker">
             <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
          </div>
      </div>
    </div>       
  </div>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
  <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
</form> 
<script>
  $(function () {
  $('#edit_in').datetimepicker({
     format: 'LT'
     });
  });
    $(function () {
  $('#edit_out').datetimepicker({
     format: 'LT'
     });
  });
</script>
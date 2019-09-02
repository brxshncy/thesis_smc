<?php
include 'db.php';
global $conn;
	
	if(isset($_POST['edit_id'])){
		$id = $_POST['edit_id'];

		$fetch = "SELECT * FROM assign_rescuer WHERE id = '$id' ";
			$result = mysqli_query($conn,$fetch);
			while($data = mysqli_fetch_assoc($result)){
				$assign_rescuer = $data['id'];
				$firstname = $data['firstname'];
                $lastname = $data['lastname'];
				$contact = $data['contact'];
				$gender = $data['gender'];
				$address = $data['address'];
				$unit_name = $data['unit_name'];
                $username = $data['username'];
			}
	}
?>
<form action ="include/update_member.php" method= "POST" enctype="multipart/form-data">
	<input type="hidden" name="update_id" id="update_id" value="<?php echo $assign_rescuer;?>">
        <div class="col">
            <div class="form-group">
                <label for="email-input" class=" form-control-label">Member ID</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $assign_rescuer; ?>" readonly="">
            </div><!--end of form-group-->

             <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
             </div>
             <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
             </div>
             <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
             </div>
             <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>">
             </div>
             <div class="form-group">
                    <label>Gender</label>
                                    <br>
             <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
             </div>
             <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
             </div>
             </div>
             <div class="form-group">
                    <label>Team Name</label>
                        <input type="text" class="form-control" name="unit_name" id="unit_name" value="<?php echo $unit_name;?>" readonly="">
             </div>
             <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address"value="<?php echo $address; ?>">
             </div>
                             <!-- <div class="form-group">
                                    <label for="exampleFormControlFile1">Profile Picture</label>
                                    <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
                                 </div>  -->                                    
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" id="update" name="update" value="Edit">
                      </div>
            </form> 
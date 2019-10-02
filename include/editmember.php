<?php
include 'db.php';
global $conn;
    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];

        $fetch = "SELECT ar.*, CONCAT(r1.firstname,' ',r1.lastname) AS name, r1.username as username, ar.id AS id FROM teams ar LEFT JOIN rescuers r1 ON r1.id = ar.rescuers_id WHERE ar.id = '$id' ";
            $result = mysqli_query($conn,$fetch);
            while($data = mysqli_fetch_object($result)){
                $assign_rescuer = $data->id;
                $name = $data->name;
                $username = $data->username;
            }
    }
?>
<form action ="include/update_member.php" method= "POST" enctype="multipart/form-data">
    <input type="hidden" name="update_id" id="update_id" value="<?php echo $assign_rescuer;?>">
        <div class="col">
            <div class="form-group">
                    <label>Team</label>
                        <select name="team_unit" id="team_unit" class="form-control">
                            <option value="">Select Team</option>
                            <?php
                                $select = "SELECT * FROM unit_name";
                                $result = $conn->query($select);
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['id']; ?>"> <?php echo $row['unit_name'];?> </option>
                            <?php
                                }
                            ?>
                        </select>
             </div>

             <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $name; ?>" readonly="">
             </div>
             <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
             </div>
           <!-- <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" readonly="">
             </div>
             <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
             </div>
             <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" readonly>
             </div>
             <div class="form-group">
                    <label>Gender</label>
                    <input type="text" value="<?php echo $gender; ?>" name="gender" id="contact" class="form-control" readonly> 
             </div>
            
             <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address"value="<?php echo $address; ?>" readonly>
             </div>*/
                              <div class="form-group">
                                    <label for="exampleFormControlFile1">Profile Picture</label>
                                    <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
                                 </div>                                     
                  </div> -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" id="update" name="update" value="Edit">
                      </div>
            </form> 
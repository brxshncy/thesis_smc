<?php
include 'db.php';
global $conn;
    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];

        $fetch = "SELECT *, CONCAT(r.firstname,' ',r.lastname) AS name, r.address AS address, r.profile_picture AS profile, r.gender AS gender, r.contact as contact, r.role as role, t.unit_name as team  FROM unit_name t LEFT JOIN rescuers r ON r.team_unit = t.id WHERE t.id = '$id' ";
            $result = mysqli_query($conn,$fetch);
            while($data = mysqli_fetch_object($result)){
                $assign_rescuer = $data->id;
                $name = $data->name;
                $username = $data->username;
                $team = $data->team;
            }
    }
?>
<form action ="include/update_member.php" method= "POST" enctype="multipart/form-data">
    <input type="hidden" name="update_id" id="update_id" value="<?php echo $assign_rescuer;?>">
        <div class="col">
            <div class="form-group">
                    <label>Team</label>
                        <select name="team_unit" id="team_unit" class="form-control" required="">
                            
                            <?php
                                $select = "SELECT * FROM unit_name";
                                $result = $conn->query($select);
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['id']; ?>"> <?php echo $row['unit_name'] ?> </option>
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
              <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value=""></option>
                        <option value="Transport Officer">Transport Officer</option>
                        <option value="Treatment Officer">Treatment Officer</option>
                        <option value="Member"> Member</option>
                    </select>
             </div>
       
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" id="update" name="update" value="Edit">
                      </div>
            </form> 
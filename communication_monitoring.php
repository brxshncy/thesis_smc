<?php require('include/db.php'); 
session_start();
if(!isset($_SESSION['username_admin']) || $_SESSION['admin_type'] != 'communication'){
		$_SESSION['logistics_msg'] = "You must logged in as communication Admin First";
		header("location:icdrrmo_login.php");
	}

?>
<?php include('communication/header.php'); ?>

<div class="main-content">
 <div class="section__content section__content--p30">
  <div class="container-fluid">
	<div class="card">
	 <div class="card-header"><b>Emergency Calls</b></div>
	  <div class="card-body">
		 <div class="row">
		    <div class="col-sm-12 table-responsive mt-4">
		    	<div class="row">
  		    	 <div class="col col-md-10">
  		    			<?php
  		    				if(isset($_SESSION['insert'])):?>
  		    					<div class="alert alert-success">
  		    						<?php echo $_SESSION['insert'];
  		    							unset($_SESSION['insert']);
  		    						?>
  		    					</div>
  		    		<?php endif	?>
  		    		<?php
  		    				if(isset($_SESSION['error'])):?>
  		    					<div class="alert alert-danger">
  		    						<?php echo $_SESSION['error'];
  		    							unset($_SESSION['error']);
  		    						?>
  		    					</div>
  		    		<?php endif	?>
              <?php
                  if(isset($_SESSION['update'])):?>
                    <div class="alert alert-info">
                      <?php echo $_SESSION['update'];
                         unset($_SESSION['update']);
                      ?>
                    </div>
              <?php endif ?>
            </div>
  		    	  <div class="col col-md-2 mb-4">
  		    			 <button type="button" id="logs" class="btn btn-danger pull-right btn-block"  data-toggle="modal" data-target="#add_logs">
                     <i class="fas fa-phone-volume mr-2"></i>  Emergency
                 </button>
  		    		</div>
		   		 </div>
          		<table id="item_list" class="table table-bordered table-striped">
	          		<thead>
	          		  <tr>	
                  <th>No.</th>
		          		<th class="text-center">Name of Patient</th>
		          		<th class="text-center">Name of Caller</th>
		          		<th class="text-center">Chief Complaints</th>
                  <th class="text-center">Date of Incident</th>
		          		<th class="text-center">Action</th>
	          		</tr>
	          		</thead>
	                <tbody>
	                 <?php
                    $call_logs = "SELECT * FROM emergency_call";
                    $result = $conn->query($call_logs);
                    $counter = 1;
                    while($row=mysqli_fetch_assoc($result)){
                      $patient = $row['p_fname']." ".$row['p_lname'];
                      $caller = $row['c_fname']." ".$row['c_lname'];
                      $date = date("F j, 20y", strtotime($row['date_call']));
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $counter; ?></td>
                        <td class="text-center"><?php echo $patient; ?></td>
                        <td class="text-center"><?php echo  $caller; ?></td>
                        <td class="text-center"><?php echo $row['reason_call']; ?></td>
                        <td class="text-center"><?php echo $date; ?></td>
                        <td class="text-center">
                            <button class="item view_call" style="color:green;" data-toggle="tooltip" data-placement="top" id="<?php echo $row['id'] ?>" title="View Full Details">
                                <i class="fa fa-eye"></i>
                            </button> 
                            <button class="item edit_call ml-3" style="color:blue;"data-toggle="modal"  data-placement="top" id="<?php echo $row['id']; ?>" title="Update Details">
                                <i class="fa fa-edit (alias)"></i>
                            </button> 
                        </td>
                      </tr>

                   <?php $counter ++;}
                   ?>              
	                </tbody>
          		</table>
          		</div>
		      </div>
		    </div>
	      </div>
		</div>  
     </div>
   </div>


<!-- Modal -->
<div class="modal fade" id="add_logs">
    <div class="modal-dialog modal-lg">
        <form action="include/call_logs.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Call Details</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                                <input type="hidden" value="0" id="notification" name="notification">
                                <div class="row">
                                  <div class="col">
                                    <p class="text-danger">*Patient Info</p>
                                  </div>
                                </div>
                                <hr>
                                  <div class="row form-group">
                                      <div class="col col-md-6">
                                       <input type="text" name="p_fname" id="p_fname" class="form-control" placeholder="Patient First Name" >
                                      </div>
                                       <div class="col col-md-6">
                                       <input type="text" name="p_lname" id="p_lname" class="form-control" placeholder="Patient Last Name">
                                      </div>
                                  </div>
                               <div class="row">
                                <div class="col">
                                  <p class="text-danger">*Caller Info</p>
                                </div>
                               </div>
                               <hr>
                               <div class="row form-group">
                                      <div class="col col-md-6">
                                       <input type="text" name="c_fname" id="c_fname" class="form-control" placeholder="First Name">
                                      </div>
                                       <div class="col col-md-6">
                                       <input type="text" name="c_lname" id="c_lname" class="form-control" placeholder="Last Name">
                                      </div>
                                  </div>
                              <hr>
                                <div class="form-group">
                                    <label class="text-danger">*Chief Complaints</label>
                                    <textarea name="reason_call" id="reason_call" class="form-control" rows="4"></textarea>
                                </div>
                              <hr>
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label>*Number of Caller</label>
                                        <input type="number" name="number_caller" id="number_caller" class="form-control">
                                    </div>
                                    <div class="col col-md-6">
                                        <label>*Date of Incident</label>
                                        <input type="date" name="date_call" id="date_call" class="form-control">
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="row form-group mt-2">
                                   <div class="col col-md-6">
                                    <div class="input-group date" id="call_time" data-target-input="nearest">
                                      <input type="text" placeholder="Time of Call" class="form-control datetimepicker-input" data-target="#call_time" name="call_time" required="">
                                      <div class="input-group-append" data-target="#call_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                      </div>
                                    </div>
                                   </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                   <div class="col-md-12">
                                        <label>Address of Incident</label>
                                        <input type="text" name="address_incident" id="address_incident" class="form-control">
                                    </div>
                                </div>
                                 <div class="row form-group">
                                   <div class="col-md-12">
                                        <label>Hospital (transfer)</label>
                                        <input type="text" name="hospital" id="hospital" class="form-control">
                                    </div>
                                </div>
                         </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="submit" id="notify">Alert Rescuers</button>
                        </div>
                </div>
        </form>
    </div>
</div>
<div class="modal fade" id="call_logs">
    <div class="modal-dialog modal-lg">
        <form action="include/call_logs.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Call Details</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body" id="call_view">
                                
                         </div>
                </div>
        </form>
    </div>
</div>
<div class="modal fade" id="edit_logs">
    <div class="modal-dialog modal-lg">
        <form action="include/call_update.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Call Details</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body" id="call_edit">
                                
                         </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" name="update">Update</button>
                        </div>
                </div>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>
<?php include('communication/footer.php');?>
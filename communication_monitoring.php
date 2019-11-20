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
		    	  	<div class="col col-m6-5 mb-4" style="margin-left:30px;">
		    			 <button type="button" id="logs" class="btn btn-danger"  data-toggle="modal" data-target="#add_logs">
                   <i class="fas fa-phone-volume mr-2"></i>  Emergency
               </button>
		    		</div>
		   		 </div>
          		<table id="item_list" class="table table-bordered table-striped">
	          		<thead>
	          		  <tr>	
                  <th>No.</th>
		          		<th class="text-center">Name of Caller</th>
		          		<th class="text-center">Reason for Calling</th>
		          		<th class="text-center">Number of Caller</th>
		          		<th class="text-center">Action</th>
	          		</tr>
	          		</thead>
	                <tbody>
	                 <?php
                    $call_logs = "SELECT * FROM call_logs";
                    $result = $conn->query($call_logs);
                    $counter = 1;
                    while($row=mysqli_fetch_assoc($result)){?>
                      <tr>
                        <td class="text-center"><?php echo $counter; ?></td>
                        <td class="text-center"><?php echo $row['name'] ?></td>
                        <td class="text-center"><?php echo $row['reason_call'] ?></td>
                        <td class="text-center"><?php echo $row['number_caller'] ?></td>
                        <td class="text-center">
                            <button class="item view_call" style="color:green;" data-toggle="tooltip" data-placement="top" id="<?php echo $row['id'] ?>" title="View Full Details">
                                <i class="fa fa-eye"></i>
                            </button> ||
                            <button class="item edit_call" style="color:blue;"data-toggle="modal"  data-placement="top" id="<?php echo $row['id']; ?>" title="Update Details">
                                <i class="fa fa-edit (alias)"></i>
                            </button> ||
                             <button class="item del_call" style="color:red;" data-toggle="modal" data-placement="top" title="Delete" id="<?php echo $row['id']; ?>">
                                <i class="zmdi zmdi-delete"></i>
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
                                <div class="form-group">
                                    <label class="text-danger">*Name of Caller</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-danger">*Reason for Calling</label>
                                    <textarea name="reason_call" id="reason_call" class="form-control"></textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label>*Number of Caller</label>
                                        <input type="number" name="number_caller" id="number_caller" class="form-control">
                                    </div>
                                    <div class="col col-md-6">
                                        <label>*Date of Call</label>
                                        <input type="date" name="date_call" id="date_call" class="form-control">
                                    </div>
                                 </div>
                                 <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>Time of Call</label>
                                        <input type="text" name="time_call" id="time_call" class="form-control">
                                    </div>
                                     <div class="col-md-6">
                                        <label>Address of Incident</label>
                                        <input type="text" name="address_incident" id="address_incident" class="form-control">
                                    </div>
                                </div>
                         </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
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

<div class="modal fade" id="del_logs">
    <div class="modal-dialog modal-lg">
        
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Warning!!!</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                                <h4>Are you sure you want to delete this data?
                         </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" id="delete" name="del">Delete</button>
                        </div>
                </div>
  
    </div>
</div>
<?php include('footer.php'); ?>
<?php include('communication/footer.php');?>
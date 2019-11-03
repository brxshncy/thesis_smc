<?php 
include 'include/db.php'; 
session_start();
if(!isset($_SESSION['username_admin']) || $_SESSION['admin_type'] != 'logistics'){
		$_SESSION['logistics_msg'] = "You must logged in as Logistics Admin First";
		header("location:icdrrmo_login.php");
	}
?>	
<?php include 'logistics/header.php';?>

<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
	 <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                         <h2 class="title-1">overview</h2>
                    </div>
                </div>
            </div>
             <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                	 <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <a href="logistics_requestitem.php"><i class="far fa-flag"></i></a>
                                </div>
                                            <div class="text">
                                            <?php
                                                $teams = "SELECT COUNT(id)  AS team FROM opr_item_request";
                                                $result = $conn->query($teams);
                                                $count_team = mysqli_num_rows($result);
                                                $row = mysqli_fetch_assoc($result);
                                                $team = $row['team'];
                                                
                                            ?>
                                                <h2><?php echo $team; ?></h2>
                                                <span><?php echo 'Item Request' . (($team > 1) ? 's' : '');?></span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
         <div class="jumbotron bg-light">
             <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Inventory</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Item Name</th>
                                                <th class="text-center">Item Description</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Unit Measure</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                              $select = "SELECT * FROM items";
                              $counter = 0;
                              $result = mysqli_query($conn,$select);
                            ?>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                  $counter++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $row['item_name'] ?></td>
                                <td class="text-center"><?php echo $row['item_description'] ?></td>
                                <td class="text-center"><?php echo $row['quantity'] ?></td>
                                <td class="text-center"><?php echo $row['unit_measure'] ?></td>
                                <td class="text-center"> 
                                <a href="logistics_in_items.php">
                                	<button class="item edit_button" style="color:green;" data-toggle="tooltip" data-placement="top" title="Edit" id="<?php echo $row['id'];?>">
                                        <i class="fa fa-eye "></i>
                                    </button>
                                 </a>
                                </td>
                            </tr>
                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

</div>
</div>
</div>






<?php include 'footer.php';?>
<?php include 'logistics/footer_l.php'; ?>








    
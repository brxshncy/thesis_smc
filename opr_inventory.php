  <?php 
  session_start();
  include 'include/db.php';
  if(!isset($_SESSION['username_admin']) || $_SESSION['admin_type'] != 'operation'){
    $_SESSION['logistics_msg'] = "You must logged in as Operation Admin First";
    header("location:icdrrmo_login.php");
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Inventory</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

       <!-- Pagination-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
   


    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
  <div class="page-wrapper">
    <?php include 'header-mobile.php'; ?>
    <?php include 'menu-sidebar.php';?>
    <div class="page-container">
    <?php include 'header-php.php' ?>
           
 <!-- MAIN CONTENT-->
<div class="main-content">
 <div class="section__content section__content--p30">
   <div class="container-fluid">
     <div class="jumbotron" style="background-color: #fff;">
        <div class="row">
              <div class="col">
                <h3>Inventory</h3>
              </div>    
            <div class="col col-md-4">
                <button type="button" title="Request" class="btn btn-success pull-right" id="add" data-toggle="modal" data-target="#add_item">
                 <i class="fa fa-envelope"></i>  Request Item
                </button>
                <div class="noti__item js-item-menu pull-right">
                   <button type="submit" id="notif"> <i class="zmdi zmdi-notifications"></i>
                    <?php
                        $notif = "SELECT * FROM item_accept_request WHERE notif = '1'";
                        $result_notif = $conn->query($notif);
                        $count_status = mysqli_num_rows($result_notif);
                        if($count_status>0){ ?>
                        <span class="quantity" id="count"><?php echo $count_status ?></span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have <?php echo $count_status ?> Notifications</p>
                                </div>
                                <?php while($row=mysqli_fetch_assoc($result_notif)){ 
                                    $date_i = date("F j 20y", strtotime($row['date_accepted']));
                                 ?>
                                    <div class="notifi__item">
                                        <div class="bg-c1 img-cir img-40">
                                            <i class="zmdi zmdi-email-open"></i>
                                        </div>
                                        <div class="content">
                                           <a href="op_items.php?view=<?php echo $row['id'] ?>"> 
                                            <p>
                                                You recieved a <?php echo $row['quantity'] ?> <?php echo $row['unit_measure']?> of <?php echo $row['item_name'] ?> 
                                            </p>
                                            <span class="date"><?php echo $date_i ?></span></a>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <div class="notifi__footer">
                                        <a href="#">All notifications</a>
                                    </div>
                            </div>
                    <?php } else{ ?>
                            <?php
                                $notif_read = "SELECT * FROM item_accept_request WHERE notif= 0";
                                $result_notif_read = $conn->query($notif_read);

                            ?>
                             <span class="quantity" id="count"></span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have <?php echo $count_status ?> Unread Notifications</p>
                                </div>
                                <?php
                                    while($row1=mysqli_fetch_assoc($result_notif_read)) {
                                     $date_ii = date("F j 20y,",strtotime($row1['date_accepted']));
                                     ?>
                                    <div class="notifi__item">
                                        <div class="content">
                                            <a href="javascript: void(0)" class="push_notif" id="<?php echo $row1['id']?>"> 
                                                <p>
                                                   
                                                    You recieved a <?php echo $row1['enter_quantity'] ?> <?php echo $row1['unit_measure']?> of <?php echo $row1['item_name'] ?> 
                                                </p>
                                                <span class="date"><?php echo $date_ii ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <div class="notifi__footer">
                                        <a href="#">All notifications</a>
                                    </div>
                            </div>
                   <?php }?>
            </div>
        </form>
            </div>
            </div>
                <hr>
                <div class="row mt-2">
                <?php 
                    if(isset($_SESSION['succes_request'])):?>
                        <div class="col mt-3">
                            <div class="alert alert-success">
                                <?php echo $_SESSION['succes_request']; 
                                     unset($_SESSION['succes_request']);
                                ?>
                            </div>
                        </div>
                <?php endif ?>
                <?php
                    if(isset($_SESSION['insufficient'])):?>
                        <div class="col mt-3">
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['insufficient'];
                                      unset($_SESSION['insufficient']);
                                ?>
                            </div>
                        </div>
                <?php endif ?>
                    <div class="col-sm-12 table-responsive mt-3">
                        <table id="item-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                        <th style="text-align:center;">Item Code</th>
                                        <th style="text-align:center;">Item Name</th>
                                        <th style="text-align:center;">Item Description</th>
                                        <th style="text-align:center;">Quantity</th>
                                        <th style="text-align:center;">Unit Measure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $display_item = "SELECT * FROM items";
                                    $result = $conn->query($display_item);
                                    $row_data = mysqli_num_rows($result);
                                    $code = "ITM";
                                    if($row_data>0){
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td style="text-align:center;"><?php echo $code.''.$row['id']?></td>
                                        <td style="text-align:center;"><?php echo isset($row['item_name']) && !empty($row['item_name']) ? $row['item_name'] : 'No Input' ?></td>
                                        <td style="text-align:center;"><?php echo isset($row['item_description']) && !empty($row['item_description']) ? $row['item_description'] : 'No Input' ?></td>
                                        <td style="text-align:center;"><?php echo isset($row['quantity']) && !empty($row['quantity']) ? $row['quantity'] : 'No input' ?></td>
                                        <td style="text-align:center;"><?php echo isset($row['unit_measure']) && !empty($row['unit_measure']) ? $row['unit_measure'] : 'No input' ?></td>
                                    </tr>
                                <?php }}else{
                                    echo '<td colspan="4">No Item available</td>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
     </div>
  </div>
</div>
  <?php include 'footer.php'; ?>
</div>
<div class="modal fade" id="add_item">
    <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Request Item</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="include/request_opr_item.php" method="POST">
                        <div class="modal-body">
                            <div class="row mt-2">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <?php
                                             $admin = $_SESSION['username_admin'];
                                            $sender = "SELECT * FROM admin_login WHERE username = '$admin'";
                                            $result_sender = $conn->query($sender);
                                            $fetch_sender = mysqli_fetch_assoc($result_sender);
                                            $id = $fetch_sender['id'];
                                        ?>
                                    <input type="hidden" value="<?php echo $id;?>" name="sender">
                                    <label class="text-danger">*Select Item</label>
                                        <select name="item" class="form-control" id="item">
                                            <option value=""></option>
                                        <?php 
                                            $select_item = "SELECT * From items";
                                           
                                            
                                            $result = $conn->query($select_item);
                                            $data_row = mysqli_num_rows($result);

                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>

                                            <option value="<?php echo $row['id']?>"><?php echo $row['item_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                                <div class="col col-md-3">
                                    <div class="form-group">
                                   
                                    <?php 
                                        date_default_timezone_set('Asia/Manila');
                                        $date = date("F j, Y");
                                        $time = date("h:i a");
                                    ?>
                                    <input type="hidden" name="date" id="date" class="form-control "  value="<?php echo $date; ?>" readonly>
                                    </div>
                                </div>
                                 <div class="col col-md-3">
                                    <div class="form-group">
                                  
                                    <input type="hidden" name="time" id="date" class="form-control "  value="<?php echo $time; ?>" readonly>
                                    <input type="hidden" name="status" id="status" class="form-control "  value="unread" readonly>
                                    </div>
                                </div>
                            </div>
                             <div id="show_info" class="mt-4 ml-2">
                            <hr>
                                    <div class="form-row mt-4" style="margin-top:20px;">
                                            <div class="col col-md-4">
                                                <label class="text-danger">*Item Name</label>
                                                <input type="text" name="item_name" id="item_name" class="form-control" readonly="">
                                            </div>
                                            <div class="col col-md-6 ml-3">
                                                <label class="text-danger">*Item Description</label>
                                                <input type="text" name="item_description" id="item_description" class="form-control" readonly="">
                                            </div>
                                    </div>
                                    <div class="form-row mt-2" style="margin-top:20px;">
                                            <div class="col col-md-4">
                                                <label class="text-danger">*Quantity</label>
                                                <input type="text" name="quantity" id="quantity" class="form-control" style="margin-top:-5px;" readonly="">
                                            </div>

                                            <div class="col col-md-4 ml-3">
                                                <label class="text-danger">*Unit of Measure</label>
                                                <input type="text" name="unit_measure" id="unit_measure" class="form-control" style="margin-top:-5px;" readonly="">
                                            </div>
                                    </div>
                                    <hr>
                                    <div class="form-row mt-2">
                                        <div class="col col-md-3">
                                            <label>Enter Quantity</label>
                                            <input type="text" name="enter_quantity" class="form-control" id="enter_quantity">
                                        </div>
                                        <div class="col col-md-9">
                                            <label>Purpose</label>
                                            <input type="text" name="purpose" class="form-control" id="purpose">
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </div>
                        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="view_inventory">
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Request Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id="view_items">
                            
                       
                </div>         
        </div>
    </div>
</div>


    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function(){
        $('table').DataTable();

        
        $('#notif').click(function(){
            var id = 0;
            $.ajax({
                url: 'include/notif.php',
                method: 'post',
                data:{id,id},
                success:function(data){
                    $('#count').html("<p></p?");
                }
            })
        })

        $('.push_notif').click(function(){
            var view = $(this).attr('id');
            $.ajax({
                url: 'op_items.php',
                method: 'post',
                data:{view:view},
                success:function(data){
                    $('#view_items').html(data);
                    $('#view_inventory').modal('show');
                }
            })
        })


        $('#show_info').hide();
           $('#item').change(function(){
                var id = $(this).val();
            if(!id == '' || !id == 'undefine'){
                 $.ajax({
                    url: 'include/opr_itemsinfo.php',
                    method: 'post',
                    data:{id:id},
                    dataType: 'JSON',
                    success:function(data){
                        $('#show_info').show();
                        $('#item_name').val(data.item_name);
                        $('#item_description').val(data.item_description);
                        $('#quantity').val(data.quantity);
                        $('#unit_measure').val(data.unit_measure);
                    }
                });
            }   else{
                    $('#show_info').hide();
                }
            });
        });
         $("#enter_quantity").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        })
    </script>
</body>

</html>
<!-- end document-->

  <?php 
  session_start();
  include 'include/db.php';
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
            </div>
                <hr>
                <div class="row mt-2">
                    <div class="col col-md-6">
                        <input tye="text" class="form-control" id="search" placeholder="Search for available items">
                    </div>
                    <div class="col col-md-6">
                        <button type="button" class="btn btn-success btn-xs" id="add" data-toggle="modal" data-target="#add_item">
                          <i class="fa fa-envelope mr-1"></i>  Request Item
                        </button>
                    </div>
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

                    <div class="col-sm-12 table-responsive mt-3">
                        <table id="item-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                        
                                        <th>Item Name</th>
                                        <th>Item Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Measure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $display_item = "SELECT * FROM items";
                                    $result = $conn->query($display_item);
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        
                                        <td><?php echo isset($row['item_name']) && !empty($row['item_name']) ? $row['item_name'] : 'No Input' ?></td>
                                        <td><?php echo isset($row['item_description']) && !empty($row['item_description']) ? $row['item_description'] : 'No Input' ?></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td><?php echo $row['unit_measure'] ?></td>
                                    </tr>
                                <?php }
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
        </form>
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

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function(){
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

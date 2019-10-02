<?php include 'include/db.php'; ?>
<?php include 'operation/template_header.php'; ?>


 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

                <div class="jumbotron bg-light">
                    <?php if(isset($_SESSION['msg'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                            ?>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['msg-del'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['msg-del'];
                                    unset($_SESSION['msg-del']);
                            ?>
                        </div>
                    <?php endif ?>
                                <table class="table table-hover table-light" id="table_search">
                                            <thead class="table-primary">
                                                <th>No.</th>
                                                <th>From</th>
                                                <th>Request</th>
                                                <th>Action</th>
                                            </thead>
                                <tbody>
                                <?php
                                    $locator = "SELECT * FROM locatorslip_request";
                                    $counter = 0;
                                    $result = $conn->query($locator);
                                    if(mysqli_num_rows($result)){


                                    $field_count = $result->field_count;
                                    if($field_count>0){  
                                        while($row = mysqli_fetch_assoc($result)){
                                            $counter ++;
                                            $id = $row['id'];
                                            $name = $row['firstname']." ".$row['lastname'];

                                ?>
                                <tr>
                                        <td width="5%" class=""><?php echo $counter; ?></td>
                                        <td width="30%" class=""><?php echo $name; ?></td>
                                        <td>
                                            <button type="button"  class="btn btn-success btn-sm view_info" id="<?php echo $id; ?>">
                                                    Slip info
                                            </button> 
                                        </td>
                                        <td width="30%">
                                            <div class="row">
                                                <a href="accept_request.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-primary btn-sm">Accept</button></a>
                                                <a href="reject_request.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-danger btn-sm ml-2">Reject</button></a>
                                            </div>
                                        </td>
                            </tr>
                        </tbody>
                             
                                <?php
                                         }
                                    }}else{
                                        echo "<tr><td>No pending request</td></tr>";
                                    }
                                ?>
                    </table> 

            </div> 
        </div>  
    </div>
</div>

   <?php include 'footer.php';?>

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
        $('.view_info').popover({
            title:fetchData,
            html:true,
            placement:'right'
        });

        function fetchData(){
            var fetch_data;
            var id = $(this).attr('id')
             $.ajax({
                url: 'slip_info.php',
                type: 'post',
                data:{id:id},
                async:false,
                success:function(data){
                    fetch_data = data;
                }
            });
            return fetch_data;  
        }
    });
</script>

</body>

</html>

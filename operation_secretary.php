<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require ('include/db.php');
			

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
    <title>Rescuer Homepage</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>

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
    <?php include ('secretary/scr_header.mobile.php'); ?>
    <?php include ('secretary/scr_sidebar.php');?>
    <?php include ('secretary/scr_header.php'); ?>
        <div class="page-container">
        
           
            


 <!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
    <div class="jumbotron" style="background-color: #fff;">
        <div class="table-responsive-md">
            <table class="table table-bordered table-striped">
               <thead class="thead">
                  <tr class="table-primary" style="border-color:black;">
                    <th class="text-center">No.</th>
                    <th class="text-center">Patient Care Report</th>
                    <th class="text-center">Sender</th>
                    <th class="text-center">Team</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $pcr = "SELECT pcr.id AS id,  CONCAT(r.firstname,' ',r.lastname) as sender, un.unit_name as team FROM pcr_submit pcr 
                        LEFT JOIN rescuers r ON pcr.sender = r.id 
                        LEFT JOIN unit_name un ON un.id = pcr.team";
                        $run_pcr = $conn->query($pcr) or trigger_error(mysqli_fetch_assoc($conn)." ".$pcr);
                        $counter = 1;
                        while($row = mysqli_fetch_assoc($run_pcr)){
                        ?>
                    <tr>
                        <td class='text-center'><?php echo $counter; ?></td>
                        <td class='text-center'>
                            <button class="item" title="View PCR">
                                <i class="fas fa-envelope text-success"></i>
                        </td>
                        <td class="text-center"><?php echo $row['sender'] ?></td>
                        <td class='text-center'><?php echo $row['team'] ?></td>
                        <td class='text-center'>
                            <button class="item" title="Edit PCR">
                                <i class="fas fa-edit text-primary"></i>
                            </button>
                            <button class="item ml-2 barangay_tally" title="Barangay Response Tally" id="<?php echo $row['id'] ?>">
                                <i class="fas fa-clipboard text-info"></i>
                            </button>
                            <button class="item ml-2" title="Incident Tally">
                               <i class="fas fa-laptop text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    <?php $counter++; }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<!--Submit Modal -->
<div class="modal fade" id="brgy_content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Barangay Involve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <div class="modal-body" id= "brgy_tally" >
                              

                </div>
        </div>
    </div>
</div>
<!-- end modal scroll -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
       $(document).ready(function(){
            $('table').DataTable(); 

            $('.barangay_tally').click(function(){
                var brgy_id = $(this).attr('id');
                console.log(brgy_id);
                $.ajax({
                    url: 'include/brgy_tally.php',
                    method: 'post',
                    data:{brgy_id:brgy_id},
                    success:function(data){
                        $('#brgy_tally').html(data);
                        $('#brgy_content').modal('show');
                    },
                    error: function(data){
                        Swal.fire({
                            'title': 'Error',
                            'text': 'Something went wrong!',
                            'icon': 'error',
                        })
                    }
                })
            })

       })
    </script>
</body>

</html>
<!-- end document-->
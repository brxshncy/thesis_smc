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
    <title>Patient Profile</title>

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
              <!-- HEADER MOBILE-->
        <?php include 'header-mobile.php'; ?>
        <!-- END HEADER MOBILE-->
        
        <!-- MENU SIDEBAR-->
        <?php include 'menu-sidebar.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
        <!--END OF PAGE CONTAINER-->

        <!-- HEADER DESKTOP-->
        <?php include 'header-php.php' ?>
        <!-- END OF HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
          <div class="container-fluid">
                <?php
					$conn = new mysqli('localhost','root','','icdrrmo') or die(mysqli_error($conn));
					$result = $conn->query("SELECT * FROM pcr");                 
				?>
				<table class="table table-bordered">
					<tbody>
						<?php
							if(isset($_GET['view'])){
								$id = $_GET['view'];
								$query = "SELECT * FROM pcr WHERE id = '$id' ";
								$view = mysqli_query($conn, $query);
								while($row = mysqli_fetch_array($view)){

	
						?>
							<tr class="table-info">
								<th colspan = 2><h2 style="color:#fff;" align="center">Patient Personal Information</h2></th>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Full Name</th>
								<td width="70%" class="bg-light"><?php echo $row['firstname'];?> <?php echo $row['middlename'];?><?php echo " ";?> <?php echo $row['lastname'];?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Address</td>
								<td width="70%" class="bg-light"><?php echo $row['address']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Age</td>
								<td width="70%" class="bg-light"><?php echo $row['age']; ?></td>
							</tr>					
							<tr class="table-active">
								<td width="30%" class="bg-light">Gender</td>
								<td width="70%" class="bg-light"> <?php echo $row['gender']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light"">Religion</td>
								<td width="70%" class="bg-light"><?php echo $row['religion']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light"">Nationality</td>
								<td width="70%" class="bg-light"><?php echo $row['nationality']; ?></td>
							</tr>
							<tr class="table-info">								
								<th colspan = 2 style="border-top:1px solid black;"><h2 style="color:#fff;" align="center">Incident Information</h2></th>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Date of Incident</td>
								<td width="70%" class="bg-light"><?php echo $row['date_i']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Incident Time</td>
								<td width="70%" class="bg-light"><?php echo $row['time_i']; ?></td>
							</tr>
							<tr class="table-active">
								<td clwidth="30%" class="bg-light">General Impression</td>
								<td width="70%" class="bg-light"><?php echo $row['impression']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Reason for Calling/Chief Complaints</td>
								<td width="70%" class="bg-light"><?php echo $row['reason']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Caller Relation to Patient</td>
								<td width="70%" class="bg-light"><?php echo $row['r_p1']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Contact Number</td>
								<td width="70%" class="bg-light"><?php echo $row['contact1']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Caller Relation to Patient</td>
								<td width="70%" class="bg-light"><?php echo $row['r_p2']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Contact Number</td>
								<td width="70%" class="bg-light"><?php echo $row['contact2']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Nature of Incident</td>
								<td width="70%" class="bg-light"><?php echo $row['nature']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Neuro</td>
								<td width="70%" class="bg-light"><?php echo $row['neuro']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Call Recieve</td>
								<td width="70%" class="bg-light"><?php echo $row['call_recieve']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Arrived at Scene</td>
								<td width="70%" class="bg-light"><?php echo $row['arrive_scene']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Time Left Scene</td>
								<td width="70%" class="bg-light"><?php echo $row['left_scene']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Arrived at Destination</td>
								<td width="70%" class="bg-light"><?php echo $row['arrive_destination']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Back in Service</td>
								<td width="70%" class="bg-light"><?php echo $row['back_service']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Airway</td>
								<td width="70%" class="bg-light"><?php echo $row['airway']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Breathing</td>
								<td width="70%" class="bg-light"><?php echo $row['breathing']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Pupils</td>
								<td width="70%" class="bg-light"><?php echo $row['pupils']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Pulse</td>
								<td width="70%" class="bg-light"><?php echo $row['pulse']; ?></td>
							</tr>
							<tr class="table-active">
								<td cwidth="30%" class="bg-light">Skin</td>
								<td width="70%" class="bg-light"><?php echo $row['skin']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Skin Texture</td>
								<td width="70%" class="bg-light"><?php echo $row['skin_texture']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">CRT</td>
								<td width="30%" class="bg-light"><?php echo $row['crt']; ?></td>
							</tr>
							<tr class="table-info">
								<th colspan = 2 ><h2 style="color:#fff;" align="center">Vital Signs Information</h2></th>
								
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Time</td>
								<td width="70%" class="bg-light"><?php echo $row['time_vs']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Blood Pressure</td>
								<td width="70%" class="bg-light"><?php echo $row['bp']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Prothrombin Ratio</td>
								<td width="70%" class="bg-light"><?php echo $row['pr']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Risk Ratio</td>
								<td width="70%" class="bg-light"><?php echo $row['rr']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Temperature</td>
								<td width="70%" class="bg-light"><?php echo $row['temp']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">02 Stat</td>
								<td width="70%" class="bg-light"><?php echo $row['02stat']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Eye</td>
								<td width="70%" class="bg-light"><?php echo $row['eye']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Verbal</td>
								<td width="70%" class="bg-light"><?php echo $row['verbal']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Motor</td>
								<td width="70%" class="bg-light"><?php echo $row['motor']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Total</td>
								<td width="70%" class="bg-light"><?php echo $row['total']; ?></td>
							</tr>
							<tr class="table-info">
								<th colspan = 2><h2 style="color:#fff;" align="center">Assesment</h2></th>
								
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Signs and Symtomps</td>
								<td width="70%" class="bg-light"><?php echo $row['symtomps']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Allergies</td>
								<td width="70%" class="bg-light"><?php echo $row['allergies']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Meds</td>
								<td width="70%" class="bg-light"><?php echo $row['meds']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Past Illness</td>
								<td width="70%" class="bg-light"><?php echo $row['past_ill']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Last Oral Intake</td>
								<td width="70%" class="bg-light"><?php echo $row['oral_intake']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Time </td>
								<td width="70%" class="bg-light"><?php echo $row['time_oral']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Onset</td>
								<td width="70%" class="bg-light"><?php echo $row['onset']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Provocation</td>
								<td width="70%" class="bg-light"><?php echo $row['provocation']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Quality</td>
								<td width="70%" class="bg-light"><?php echo $row['quality']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Radiation</td>
								<td width="70%" class="bg-light"><?php echo $row['radiation']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Severity</td>
								<td width="70%" class="bg-light"><?php echo $row['severity']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Timing</td>
								<td width="70%" class="bg-light"><?php echo $row['timing_i']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Events Prior</td>
								<td width="70%" class="bg-light"><?php echo $row['events_prior']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Trauma Case</td>
								<td width="70%" class="bg-light"><?php echo $row['trauma']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Burn (%TBSA)</td>
								<td width="70%" class="bg-light"><?php echo $row['burn']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Treatment</td>
								<td width="70%" class="bg-light"><?php echo $row['treatment']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Narrative</td>
								<td width="70%" class="bg-light"><?php echo $row['narrative']; ?></td>
							</tr>
							<tr class="table-info">
								<th colspan = 2><h2 style="color:#fff;" align="center">Rescuer Information</h2></th>
								
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Transport Officer</td>
								<td width="70%" class="bg-light"><?php echo $row['transport_officer']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Treatment Officer</td>
								<td width="70%" class="bg-light"><?php echo $row['treatment_officer']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light"><DATA></DATA>ispatched Unit</td>
								<td width="70%" class="bg-light"><?php echo $row['dispatched_unit']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">DESTINATION DETERMINATION</td>
								<td width="70%" class="bg-light"><?php echo $row['desti_deter']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">RESPONSE MODE</td>
								<td width="70%" class="bg-light"><?php echo $row['response_mode']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">TRANSPORT MODE</td>
								<td width="70%" class="bg-light"><?php echo $row['transport_mode']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Receiving Facility</td>
								<td width="70%" class="bg-light"><?php echo $row['receiving_facility']; ?></td>
							</tr>
							<tr class="table-active">
								<td width="30%" class="bg-light">Receiving MD/RN/Relative</td>
								<td width="70%" class="bg-light"><?php echo $row['receiving_md']; ?></td>
							</tr>
							<tr>
								<td colspan="2" class="bg-light" align="center">
									<button type="button"  class="btn btn-primary btn-lg">
                                           		<i class="fa fa-print"></i>&nbsp; Print This
                                    </button>
                                </td>
                               
							</tr>
							<?php
									}
							}
							?>
					</tbody>
				</table> 
				
				
			
         </div>
    </div>
</div>



                 <!--==================================== FOOTER ============================================================== -->
                        <?php include 'footer.php'?>
                 <!--==================================== FOOTER ============================================================== -->
              
        



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

</body>

</html>
<!-- end document-->

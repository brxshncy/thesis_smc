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

        </div>
    </div>
</div>






<?php include 'footer.php';?>
<?php include 'logistics/footer_l.php'; ?>








    
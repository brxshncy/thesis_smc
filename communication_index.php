<?php require('include/db.php'); 
session_start();
if(!isset($_SESSION['username_admin']) || $_SESSION['admin_type'] != 'communication'){
		$_SESSION['logistics_msg'] = "You must logged in as communication Admin First";
		header("location:icdrrmo_login.php");
	}
?>
?>
<?php include('communication/header.php'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<?php include('communication/footer.php');?>
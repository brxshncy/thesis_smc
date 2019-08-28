<?php
session_start();
include 'include/db.php';
	unset($_SESSION['username']);
	unset($_SESSION['admin_type']);
	session_destroy();
	header("location:icdrrmo_login.php");
?>
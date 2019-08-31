<?php
session_start();
include 'include/db.php';
	session_destroy();
	unset($_SESSION['confirm_username']);
	header("location:rescuer_login.php");
?>
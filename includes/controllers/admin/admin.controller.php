<?php
	if(!isset($_GET['admin_id'])){
		header("Location: all_admins.php");
		exit;
	}


	$admin_id = $_GET['admin_id'];

	$admin = new User($admin_id);
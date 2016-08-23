<?php
	if(!isset($_GET['user_id'])){
		header("Location: all_users.php");
		exit;
	}


	$user_id = $_GET['user_id'];

	$user = new User($user_id);
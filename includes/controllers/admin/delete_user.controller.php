<?php
	if(!isset($_GET['user_id']) || !is_int((int)$_GET['user_id'])){

		header("Location: all_users.php");
		exit;

	}else{

		$user_id = (int)$_GET['user_id'];

		if(User::delete($user_id)){
			header("Location: all_users.php?d=success");
			exit;
		}else{
			header("Location: all_users.php?d=failed");
			exit;
		}
	}
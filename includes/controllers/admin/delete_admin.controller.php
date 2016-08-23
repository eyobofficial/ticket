<?php
	if(!isset($_GET['admin_id']) || !is_int((int)$_GET['admin_id'])){

		header("Location: all_admins.php");
		exit;

	}else{

		$admin_id = (int)$_GET['admin_id'];

		if(User::delete($admin_id)){
			header("Location: all_admins.php?d=success");
			exit;
		}else{
			header("Location: all_admins.php?d=failed");
			exit;
		}
	}
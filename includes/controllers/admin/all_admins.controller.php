<?php
	/**
	 * If admin is not superadmin, redirect to index.php
	 */
	if((int)$logged_admin->privilege !== 1){
		header("Location: index.php");
		exit;
	}



	$admins = new User();

	$all_admins = $admins->get_admins();
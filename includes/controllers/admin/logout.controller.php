<?php
	if(isset($logged_admin)){
		$_SESSION['logged_admin_id'] = null;

		header("Location: login.php");
		exit;
		
	}else{
		header("Location: index.php");
		exit;
	}
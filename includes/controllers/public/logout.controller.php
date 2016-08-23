<?php
	if(isset($logged_user)){
		$_SESSION['logged_user_id'] = null;

		header("Location: index.php");
		exit;
		
	}else{
		header("Location: index.php");
		exit;
	}
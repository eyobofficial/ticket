<?php 
	if(isset($page_context) && $page_context == "admin"){


		if(!isset($_SESSION['logged_admin_id']) && $page_title !=  "login"){

			header("Location: login.php");
			exit;

		}elseif(isset($_SESSION['logged_admin_id']) && $page_title !=  "login"){
			
			$logged_admin_id = $_SESSION['logged_admin_id'];
			$logged_admin 	 = new User($logged_admin_id);
			$logged_user 	 = new User($logged_admin_id);
		}else{
			
		}
	}


	if(isset($_SESSION['logged_user_id'])){

		$logged_user_id = $_SESSION['logged_user_id'];
		$logged_user = new User($logged_user_id);
		
	}

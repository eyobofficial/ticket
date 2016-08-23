<?php
	if(isset($_SESSION['logged_admin_id'])){
		// Means user is already logged. Must logout to login again.
		header("Location: index.php");
		exit;
	}

	
	if(isset($_POST['login'])){

		$errors = array();


		$email	    = isset($_POST['email'])     ? strtolower(trim($_POST['email'])) : "";
		$password   = isset($_POST['password'])  ? trim($_POST['password']) : "";


		$email      = $db->real_escape_string($email);
		$password   = $db->real_escape_string($password);




		// Check if user exists
		if(User::check_admin_by_email($email)){

			// User record exits
			if(User::match_password($email, $password)){
				// Successfully logged
				$_SESSION['logged_admin_id'] = User::get_id_by_email($email); 
				header("Location: index.php");
				exit;
				
			}else{
				// Loggin failed
				$errors['password'] = "1-You entered a wrong email or password. Please try again.";
			}


		}else{
			// User is NOT registered
			$errors['not_registered'] = "2-You entered a wrong email or password. Please try again.";
		}
	}else{
		$email = "";
	}

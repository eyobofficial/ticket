<?php
	if(isset($_POST['submit'])){

		// Initialize error array
		$errors = array();

		// Assign POST values to variables

		$first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : "";
		$last_name  = isset($_POST['last_name'])  ? trim($_POST['last_name']) : "";
		$email	    = isset($_POST['email'])      ? strtolower(trim($_POST['email'])) : "";
		$password1  = isset($_POST['password1'])  ? trim($_POST['password1']) : "";
		$password2  = isset($_POST['password2'])  ? trim($_POST['password2']) : "";


		// Escape strings

		$first_name = $db->real_escape_string($first_name);
		$last_name  = $db->real_escape_string($last_name);
		$email      = $db->real_escape_string($email);
		$password1  = $db->real_escape_string($password1);
		$password2  = $db->real_escape_string($password2);


		// Check and validate if form is filled

		if(empty($first_name)){
			$errors['first_name'] = "Enter your first name";
		}

		if(empty($last_name)){
			$errors['last_name']  = "Enter your last name";
		}


		if(empty($email)){
			$errors['email']      = "Enter your email";
		}

		if(empty($password1) || empty($password2)){
			$errors['password'] = "Enter password";
		}


		if($password1 !== $password2){
			$errors['match'] = "Passwords DOES NOT match";
		}

		if(strlen($password1) < 6 || strlen($password2) < 6){
			$errors['password_length'] = "Password has to be atleast 6 characters long";
		}


		if(empty($errors)){
			if(User::check_by_email($email)){
				// If user record already exists in the database
				$errors['database'] = "Your are already registered. " . "<a href='login.php' title='login'> Login</a>" ;

			}else{
				$result = User::add_admin($first_name, $last_name, $email, $password1);

				if(!$result){
					$errors['database'] = "Your registration could NOT be completed as this time. Please check your network and try again!";
				}else{
					// Login and redirect
					$_SESSION['logged_user_id'] = $db->insert_id;

					header("Location: all_admins.php?action=added");
					exit;	
				}
			}

		}



	}else{
		$first_name = "";
		$last_name = "";
		$email = "";
	}
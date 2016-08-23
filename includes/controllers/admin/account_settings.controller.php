<?php
	if(isset($_POST['submit'])){
		$errors = array();


		$first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : "";
		$last_name  = isset($_POST['last_name'])  ? trim($_POST['last_name']) : "";
		$email	    = isset($_POST['email'])      ? strtolower(trim($_POST['email'])) : "";


		// Check and validate if form is filled
		if(empty($first_name)){
			$errors['first_name'] = "First Name field cannot be blank";
		}

		if(empty($last_name)){
			$errors['last_name']  = "Last Name field cannot be blank";
		}


		if(empty($email)){
			$errors['email']      = "Email field cannot be blank";
		}

		if(User::check_by_email($email, $logged_admin->id)){
			// If user record already exists in the database
			$errors['email_taken'] = "This email is already taken" ;
		}


		if(empty($errors)){
			if(User::basic_edit($logged_admin->id, $first_name, $last_name, $email)){
				header("Location: index.php?s=success");
				exit;
			}else{
				$errors['database'] = "There is a problem with the database right now. Please try again.";
			}
		}



	}else{
		$first_name = $logged_admin->first_name;
		$last_name  = $logged_admin->last_name;
		$email      = $logged_admin->email;
	}
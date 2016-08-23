<?php
	if(!isset($_GET['admin_id']) || !is_int((int)$_GET['admin_id'])){
		header("Location: all_admins.php?s=1");
		exit;
	}else{
		$admin_id  = (int)($_GET['admin_id']);
		$errors = array();

		$admin = new User($admin_id);

		$first_name = $admin->first_name;
		$last_name  = $admin->last_name;
		$email      = $admin->email;

	}



	if(isset($_POST['submit'])){

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

		if(User::check_by_email($email, $admin_id)){
			// If user record already exists in the database
			$errors['email_taken'] = "This email is already taken" ;
		}



		// If no error
		if(empty($errors)){

			if(User::basic_edit($admin_id, $first_name, $last_name, $email)){
				header("Location: all_admins.php?s=2");
				exit;
			}else{
				$errors['database'] = "There is a problem with the database right now. Please try again.";
			}
		}



	}
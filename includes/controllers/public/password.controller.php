<?php
	if(!isset($logged_user)){
		header("Location: login.php");
		exit;
	}

	
	if(isset($_POST['submit'])){
		$errors = array();


		$password_old = isset($_POST['password_old']) ? trim($_POST['password_old']) : "";
		$password1    = isset($_POST['password_new_1'])    ? trim($_POST['password_new_1']) : "";
		$password2    = isset($_POST['password_new_2'])    ? trim($_POST['password_new_2']) : "";

		// Check and validate if form is filled
		if(empty($password_old)){
			$errors['password_old'] = "The current password field cannot be blank";
		}


		// Check and validate if form is filled
		if(empty($password1)){
			$errors['password1'] = "The new password field cannot be blank";
		}


		// Check and validate if form is filled
		if(empty($password2)){
			$errors['password2'] = "Please confirm the new password";
		}

		if($password1 !== $password2){
			$errors['match'] = "Passwords DOES NOT match";
		}

		if(strlen($password1) < 6 || strlen($password2) < 6){
			$errors['password_length'] = "Password has to be atleast 6 characters long";
		}

		


		if(empty($errors)){

			if(User::match_password($logged_user->email, $password_old)){
				if(User::update_password($password1, $logged_user->id)){
					header("Location: index.php?s=success");

					exit;
				}else{
					$errors['database'] = "There is some problem on the databse. Please try again.";
				}

			}else{

				$errors['wrong_password'] = "You entered a wrong password. Please try again.";
			}
		}



	}
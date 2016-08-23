<?php
	if(!isset($logged_user)){
		header("Location: login.php");
		exit;
	}

	$user_id = User::get_super_admin_id();



	if(isset($_POST['submit'])){

		$errors = array();

		// Assign POST values to variables

		$subject = isset($_POST['subject']) ? trim($_POST['subject']) : "(NO SUBJECT)";
		$text    = isset($_POST['text'])    ? trim(nl2br($_POST['text'])) : "";


		$errors = array();

		// Validation
		if(!isset($_POST['text']) || empty($_POST['text'])){
			$errors['name_presence'] = "Message field cannot be blank";
		}


		// If no error
		if(empty($errors)){

			if(Message::send($user_id, $subject, $text)){
				header("Location: account.php?s=success");
				exit;
			}else{
				$errors = "There is some problem on the database. Please try again.";
			}
		}



	}else{

		// Default values - if form is not submitted 
		$subject = "";
		$text    = "";
	}
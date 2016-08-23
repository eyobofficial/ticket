<?php
	if(!isset($_GET['user_id']) || !is_int((int)$_GET['user_id'])){
		header("Location: all_users.php?s=failed");
		exit;
	}else{

		$user_id = (int)$_GET['user_id'];
	}



	if(isset($_POST['submit'])){

		$errors = array();

		// Assign POST values to variables

		$subject = isset($_POST['subject']) ? trim($_POST['subject']) : "(NO SUBJECT)";
		$text    = isset($_POST['text'])    ? trim(nl2br($_POST['text'])) : "";


		$errors = array();

		// Validation
		if(!isset($_POST['text']) || empty($_POST['text'])){
			$errors['name_presence'] = "Message fill cannot be blank";
		}


		// If no error
		if(empty($errors)){

			if(Message::send($user_id, $subject, $text, true)){
				header("Location: all_users.php?s=success");
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
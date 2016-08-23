<?php
	if(!isset($logged_user)){
		header("Location: login.php");
		exit;
	}
	
	if(!isset($_GET['message_id'])){
		header("Location: messages.php");
		exit;
	}


	$message_id = (int)$_GET['message_id'];

	$message = new Message($message_id);
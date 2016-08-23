<?php
	if(!isset($logged_user)){
		header("Location: login.php");
		exit;
	}

	
	$messages = new Message;

	$recieved = $messages->get_public_recieved();
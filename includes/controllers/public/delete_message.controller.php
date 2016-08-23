<?php
	if(!isset($logged_user)){
		header("Location: register.php");
		exit;
	}

	if(!isset($_GET['message_id'])){
		header("Location: messages.php");
		exit;
	}


	$message_id = (int)$_GET['message_id'];

	if(Message::delete($message_id)){
		header("Location: messages.php?s=success");
		exit;
	}else{
		header("Location: messages.php?s=failed");
		exit;
	}
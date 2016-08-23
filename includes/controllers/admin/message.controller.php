<?php
	if(!isset($_GET['message_id'])){
		header("Location: all_messages.php");
		exit;
	}


	$message_id = $_GET['message_id'];

	$message = new Message($message_id, true);

	$sender  = new User($message->sender_id); 
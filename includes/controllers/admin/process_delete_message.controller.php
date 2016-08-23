<?php
	if(!isset($_GET['message_id'])){
		header("Location: all_messages.php");
		exit;
	}


	$message_id = (int)$_GET['message_id'];

	if(Message::delete($message_id)){
		header("Location: all_messages.php?s=success");
		exit;
	}else{
		header("Location: all_messages.php?s=failed");
		exit;
	}
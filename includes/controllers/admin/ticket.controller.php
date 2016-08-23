<?php
	if(!isset($_GET['ticket_id'])){
		header("Location: all_tickets.php");
		exit;
	}


	$ticket_id = $_GET['ticket_id'];

	$ticket = new Ticket($ticket_id);
	$event  = new Event($ticket->event_id);


	$user = new User($ticket->seller_id);

	if(User::is_admin($ticket->seller_id)){
		$owner = "Admin";
	}else{
		$owner = $user->email;
	}

<?php
	if(!isset($_GET['event_id'])){
		header("Location: all_events.php");
		exit;
	}


	$event_id = (int)$_GET['event_id'];

	$event = new Event($event_id);

	$tickets = new Ticket();
	$all_tickets = $tickets->get_by_event_id($event_id);
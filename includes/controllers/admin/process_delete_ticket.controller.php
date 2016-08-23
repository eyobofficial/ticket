<?php
	if(!isset($_GET['ticket_id'])){
		header("Location: index.php");
		exit;
	}


	$ticket_id = (int)$_GET['ticket_id'];

	if(Ticket::check_by_id($ticket_id)){

		$ticket = new Ticket($ticket_id);
		$event_id = $ticket->event_id;

	}else{
		header("Location: index.php");
		exit;
	}

	

	if($ticket->remove($ticket_id)){
		if(isset($_GET['r'])){

			$redirect = $_GET['r'];

			header("Location: " . $redirect . ".php");
			exit;

		}else{
			header("Location: edit_event.php?event_id=" . $event_id);
			exit;
		}
		
	}else{
		header("Location: index.php");
		exit;
	}
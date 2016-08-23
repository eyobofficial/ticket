<?php
	// Check if form is form is submitted

	// If 'buy now' button is submitted
	if(isset($_POST['buy_now'])){

		$event_id  = (int)$_POST['event_id'];
		$ticket_id = (int)$_POST['ticket_id'];
		$quantity  = (int)$_POST['quantity'];

		if(isset($logged_user)){
			header("Location: delivery.php?event_id={$event_id}&ticket_id={$ticket_id}&quantity={$quantity}");
			exit;
			
		}else{
			header("Location: checkout.php?event_id={$event_id}&ticket_id={$ticket_id}&quantity={$quantity}");
			exit;
		}

		
	}


	// If 'add to cart' button is submitted
	if(isset($_POST['add_to_cart'])){

		$event_id  = (int)$_POST['event_id'];
		$ticket_id = (int)$_POST['ticket_id'];
		$quantity  = (int)$_POST['quantity'];

		header("Location: add_to_cart.php?event_id={$event_id}&ticket_id={$ticket_id}&quantity={$quantity}");
		exit;
	}



	if(isset($_GET['id'])){
		$event_id = (int)($_GET['id']);

		$event = new Event($event_id);
		$ticket_packages = new Ticket;
		$tickets = $ticket_packages->get_by_event_id($event->id);

	}else{
		header("Location: index.php");
		exit;
	}
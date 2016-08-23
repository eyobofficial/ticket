<?php
	if(!isset($logged_user)){

	
		header("Location: login.php");
		exit;
	}

	// Not properly submitted
	if(!isset($_GET['ticket_id']) || !isset($_GET['event_id']) || !isset($_GET['quantity'])){

		if(isset($_GET['event_id'])){

			$event_id = (int)$_GET['event_id'];
			header("Location: event.php?id={$event_id}");
			exit;

		}else{
			header("Location: events.php");
			exit;
		}

	// Properly submitted	
	}else{
		// if properly submitted
		$ticket_id = $_GET['ticket_id'];
		$event_id  = $_GET['event_id'];
		$quantity   = $_GET['quantity'];
		$user_id   = $logged_user->id;

		if(Cart::add_to_cart($ticket_id, $quantity, $user_id)){
			header("Location: cart.php");
			exit;

		}else{
			$_SESSION['error'] = "Failed to add to status. Please try again.";
			echo "Failed";
		}

	}
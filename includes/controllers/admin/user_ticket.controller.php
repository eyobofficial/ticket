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


	if(isset($_POST['submit'])){
		$status = $_POST['status'];

		if($status == 0){
			$status = false;
		}else{
			$status = true;
		}


		if($ticket->update_status($ticket_id, $status)){
			header("Location: user_tickets.php");
			exit;
		}else{
			header("Location: user_ticket.php?ticket_id=<?php echo $ticket_id; ?>");
			exit;
		}
	}


	
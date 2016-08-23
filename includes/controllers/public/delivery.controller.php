<?php
	if(!isset($_GET['u']) && isset($logged_user)){
		$event_id  = (int)$_GET['event_id'];
		$ticket_id = (int)$_GET['ticket_id'];
		$quantity  = (int)$_GET['quantity'];

		$event = new Event($event_id);
		$ticket = new Ticket($ticket_id);

		$sub_total = $quantity * $ticket->price;

		// Get delivery methods
		$all_delivery = Delivery::get_methods();
		$delivery_count = Delivery::count();

		$countries = new Country;
		$all_countries = $countries->get_countries();



	}elseif(isset($_GET['u'])){

		// Get delivery methods
		$all_delivery = Delivery::get_methods();
		$delivery_count = Delivery::count();

		$countries = new Country;
		$all_countries = $countries->get_countries();


		
		if($_GET['u'] == 'logged'){
			$event_id  = (int)$_SESSION['login']['event_id'];
			$ticket_id = (int)$_SESSION['login']['ticket_id'];
			$quantity  = (int)$_SESSION['login']['quantity'];

			$event = new Event($event_id);
			$ticket = new Ticket($ticket_id);


			$first_name = "";
			$last_name  = "";
			$email 	    = "";

			$sub_total = $quantity * $ticket->price;


		}elseif($_GET['u'] == 'guest'){

			$event_id  = (int)$_SESSION['guest']['event_id'];
			$ticket_id = (int)$_SESSION['guest']['ticket_id'];
			$quantity  = (int)$_SESSION['guest']['quantity'];


			$first_name = strtolower((trim($_SESSION['guest']['first_name'])));
			$last_name  = strtolower((trim($_SESSION['guest']['last_name'])));
			$email 	    = strtolower((trim($_SESSION['guest']['email'])));


			$event = new Event($event_id);
			$ticket = new Ticket($ticket_id);

			
			$sub_total = $quantity * $ticket->price;
		}

	

	}else{
		header("Location: events.php");
		exit;
	}
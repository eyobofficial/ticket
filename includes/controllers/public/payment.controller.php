<?php
	if(isset($_POST['delivery_submit'])){
		$event_id  = isset($_POST['event_id'])  ? (int)$_POST['event_id'] : 0;
		$ticket_id = isset($_POST['ticket_id']) ? (int)$_POST['ticket_id'] : 0;
		$quantity  = isset($_POST['quantity'])  ? (int)$_POST['quantity'] : 0;

		$event = new Event($event_id);
		$ticket = new Ticket($ticket_id);

		$first_name = strtolower((trim($_POST['first_name'])));
		$last_name = strtolower((trim($_POST['last_name'])));
		$email = strtolower((trim($_POST['email'])));

		
		if(isset($_POST['update_me']) && $_POST['update_me'] == 1){
			$update_me = true;
		}else{
			$update_me = false;
		}


		$delivery_method_id = isset($_POST['delivery_method_id']) ? (int)$_POST['delivery_method_id'] : 0;

		if(isset($_POST['address1']) && !empty(trim($_POST['address1']))){
			$address1 = strtolower((trim($_POST['address1'])));
		}else{
			$address1 = "";
		}


		if(isset($_POST['address2']) && !empty(trim($_POST['address2']))){
			$address2 = strtolower((trim($_POST['address2'])));
		}else{
			$address2 = "";
		}


		if(isset($_POST['city']) && !empty(trim($_POST['city']))){
			$city = strtolower((trim($_POST['city'])));
		}else{
			$city = "";
		}


		if(isset($_POST['state']) && !empty(trim($_POST['state']))){
			$state = strtolower((trim($_POST['state'])));
		}else{
			$state = "";
		}


		if(isset($_POST['zip']) && !empty(trim($_POST['zip']))){
			$zip = (trim($_POST['zip']));
		}else{
			$zip = "";
		}



		$country_id = isset($_POST['country_id']) ? (int)$_POST['country_id'] : 0;


		$sub_total = $quantity * $ticket->price;
		$delivery_amount = Delivery::get_method($delivery_method_id)->price_per_ticket * $quantity;
		$total = $sub_total + $delivery_amount;
		
	}else{
		header("Location: index.php");
		exit;
	}

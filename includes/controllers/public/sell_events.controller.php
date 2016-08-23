<?php
	if(!isset($_GET['id'])){
		header("Location: sell.php");
		exit;
	}


	if(!isset($logged_user)){
		header("Location: register.php");
		exit;
	}


	$event_id = (int)$_GET['id'];

	$ticket_name  = "";
	$ticket_price = "";

	$event = new Event($event_id);
	$tickets = new Ticket;



	if(isset($_POST['submit'])){
		$errors = array();

		if(!isset($currency)){
			$currency = new currency($_SESSION['currency_id']);
		}

		if(isset($_POST['custom_seating']) && !empty(trim($_POST['custom_seating']))){
			$ticket_name = $_POST['custom_seating'];
		}else{
			$errors['name'] = "Please fill seating name.";
		}

		if(isset($_POST['ticket_number'])){
			$ticket_number = (int)$_POST['ticket_number'];
		}else{
			$errors['number'] = "Please select ticket number";
		}


		if(isset($_POST['ticket_currency'])){
			$currency_id = (int)$_POST['ticket_currency'];
		}else{
			$errors['currency'] = "Please select your prefered currency";
		}



		if(isset($_POST['ticket_price']) && !empty($_POST['ticket_price']) && (int)$_POST['ticket_price'] > 0){
			$ticket_price = (float)$_POST['ticket_price'];
			$ticket_price = $currency->convert_back($ticket_price);
		}else{
			$errors['price'] = "Please fill ticket price";
		}

		if(empty($errors)){
			if($add_ticket = $tickets->add(
				$event->id, 
				$logged_user->id,
				$ticket_name,
				$ticket_price,
				$currency_id,
				$ticket_number,
				false
			)){
				header("Location: sell_event_success.php?event_id={$event_id}&ticket_id={$ticket_id}&number={$ticket_number}");
				exit;
			}else{
				$errors['database'] = "There is a problem at the database right now. Please try again.";
			}

		}


	}

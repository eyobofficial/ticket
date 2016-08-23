<?php
	if(isset($_POST['stripeToken'])){
		$event_id  = isset($_POST['event_id']) ? (int)$_POST['event_id'] : 0;
		$ticket_id = isset($_POST['ticket_id']) ? (int)$_POST['ticket_id'] : 0;
		$quantity  = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

		$event  = new Event($event_id);
		$ticket = new Ticket($ticket_id);

		$first_name = strtolower((trim($_POST['first_name'])));
		$last_name  = strtolower((trim($_POST['last_name'])));
		$email      = strtolower((trim($_POST['email'])));

	

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
		$country = new Country($country_id);


		$sub_total = $quantity * $ticket->price;
		$delivery_amount = Delivery::get_method($delivery_method_id)->price_per_ticket * $quantity;

		$vat = VAT * ($sub_total + $delivery_amount);

		$total = $sub_total + $delivery_amount + $vat;

		$token = $_POST['stripeToken'];
		
	}elseif (isset($_POST['buy_submit'])) {
		$event_id = isset($_POST['event_id']) ? (int)$_POST['event_id'] : 0;
		$ticket_id = isset($_POST['ticket_id']) ? (int)$_POST['ticket_id'] : 0;
		$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

		$event = new Event($event_id);
		$ticket = new Ticket($ticket_id);

		if(isset($_POST['first_name']) && !empty(trim($_POST['first_name']))){
			$first_name = strtolower((trim($_POST['first_name'])));
		}else{
			$first_name = '';
		}

		if(isset($_POST['last_name']) && !empty(trim($_POST['last_name']))){
			$last_name = strtolower((trim($_POST['last_name'])));
		}else{
			$last_name = '';
		}

		if(isset($_POST['email']) && !empty(trim($_POST['email']))){
			$email = strtolower((trim($_POST['email'])));
		}else{
			$email = "";
		}

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
		$country = new Country($country_id);


		$sub_total = $quantity * $ticket->price;
		$delivery_amount = Delivery::get_method($delivery_method_id)->price_per_ticket * $quantity;

		$vat = ($sub_total + $delivery_amount) * VAT;

		$total = $sub_total + $delivery_amount + $vat;

		$token = $_POST['token'];

		if(isset($logged_user)){
			$buyer_id = $logged_user->id;
			$buyer_email = $logged_user->email;
		}else{
			$buyer_id = 0;
			$buyer_email = $email;
		}


		// some code goes here
		//...

		try {

			require_once(SITE_ROOT. "/vendor/autoload.php");

			\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

			$charge = \Stripe\Charge::create(array(
				"amount" => $total * 100, // amount in cents, again
				"currency" => "sek",
				"source" => $token,
				"description" => $email
				)
			);

			// Check that it was paid:
			if ($charge->paid == true) {

				// Store the order in the database.
				// Send the email.
				// Celebrate!
				// Successfull transaction
				// Add to purchase database of databases
				if(Order::add($ticket_id, $buyer_id, $buyer_email, $quantity, $sub_total,  $delivery_amount, $vat, $total, $first_name, $last_name, $address1, $address2, $city, $state, $zip, $country_id, $delivery_method_id)){
					header("Location: success.php");
					exit;
				}else{
					header("Location: failure.php");
					exit;
				}


				

			} else { // Charge was not paid!
				echo '<div class="alert alert-error"><h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
			}

		} catch (Stripe_CardError $e) {/* Some more code ... */}



		


	}else{
		header("Location: index.php");
		exit;
	}

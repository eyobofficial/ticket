<?php $page_title = "paymentx"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php
	$errors = array();

	if(isset($_POST['stripeToken'])){
		

		$token = $_POST['stripeToken'];



		try {

			require_once(SITE_ROOT. "/vendor/autoload.php");

			\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

			$charge = \Stripe\Charge::create(array(
				"amount" => 1313, // amount in cents, again
				"currency" => "usd",
				"source" => $token,
				"description" => "test@testing.com"
				)
			);

			//echo $charge;

			// Check that it was paid:
			if ($charge->paid == true) {

				// Store the order in the database.
				// Send the email.
				// Celebrate!
				echo "<pre>";
				echo $charge;
				echo "</pre>";
				

			} else { // Charge was not paid!
				echo '<div class="alert alert-error"><h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
			}

		} catch (\Stripe\Error\Card $e) {
	    // Card was declined.
		$e_json = $e->getJsonBody();
		$err = $e_json['error'];
		$errors['stripe'] = $err['message'];
	} catch (\Stripe\Error\ApiConnection $e) {
	    // Network problem, perhaps try again.
	} catch (\Stripe\Error\InvalidRequest $e) {
	    // You screwed up in your programming. Shouldn't happen!
	} catch (\Stripe\Error\Api $e) {
	    // Stripe's servers are down!
	} catch (\Stripe\Error\Base $e) {
	    // Something else that's not the customer's fault.
	}



	}else{
		$errors['token'] = 'The order cannot be processed. You have not been charged. Please confirm that you have JavaScript enabled and try again.';
	}

<?php
				// Handle Debit Card Payment - using stripe gateway
				if(isset($_POST['debit_submit'])){
					// Intitialize error array
					$errors = array();

					if(isset($_POST['stripeToken'])){
						$token = $_POST['stripeToken'];

						// Require stripe library
						//require_once(LIB_PATH . '/stripe/lib/Stripe.php');

	/*
						Stripe::setApiKey('sk_test_mkLtEcGQyJo7JPbamaO9GHMR');

						$charge = Stripe_Charge::create(array(
						    'amount' => 53000, // Amount in cents!
						    'currency' => 'usd',
						    'card' => $tokens,
						    'description' => 'Are we there yet?'
						));*/


						try {

							require_once(SITE_ROOT. "/vendor/autoload.php");

							\Stripe\Stripe::setApiKey(STRIPE_PRIVATE_KEY);

							$charge = \Stripe\Charge::create(array(
								"amount" => 5500, // amount in cents, again
								"currency" => "usd",
								"source" => $token,
								"description" => "test@testing.com"
								)
							);

							// Check that it was paid:
							if ($charge->paid == true) {

								// Store the order in the database.
								// Send the email.
								// Celebrate!
								echo "success";

							} else { // Charge was not paid!
								echo '<div class="alert alert-error"><h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
							}

						} catch (Stripe_CardError $e) {}



					}else{
						$errors['token'] = 'The order cannot be processed. You have not been charged. Please confirm that you have JavaScript enabled and try again.';
					}
				} 


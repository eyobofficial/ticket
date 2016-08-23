<?php $page_title = "payment"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.stripe.php'); ?>
<script type="text/javascript">Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');</script>

<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="delivery.php">Delivery</a></li>
			<li class="active"><a href="payment.php">Payment</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle">
			Payment Method 
			<span class="pull-right">Step 3 of 4 </span>
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row">
		
		<!-- LEFT PART -->
		<!-- Event and Ticket Price Summary Section -->
		<div class="col-sm-4" id="checkoutSummary">
			<?php include_once('layout/checkout_summary.inc.php'); ?>
		</div><!-- .col-sm-4 -->

		
		<!-- Payment Method - Right Part -->
		<div class="col-sm-8">
			<ul class="nav nav-tabs">
				<li role="presentation" class="active">
					<a href="#debitCard" data-toggle="tab">Debit & Credit Card</a>
				</li>

				<!-- <li role="presentation">
					<a href="#paypal" data-toggle="tab">Paypal</a>
				</li>
				
				<li role="presentation">
					<a href="#payson" data-toggle="tab">Payson</a>
				</li>
				
				<li role="presentation">
					<a href="#klarna" data-toggle="tab">Klarna</a>
				</li> -->
			</ul>

			<div class="tab-content">

				<!-- DEBIT CARD PAYMENT FORM -->
				<div class="tab-pane active" id="debitCard">

					<div>
						<ul id="payment-errors" class="text-danger"></ul>
					</div>
					
					<form action="buy.php" method="POST" id="debitForm" name="debit_form">

						<!-- Hidden Values -->
						<input type="hidden" name="event_id"   		   value="<?php echo $event->id; ?>">
						<input type="hidden" name="ticket_id"  		   value="<?php echo $ticket->id; ?>">
						<input type="hidden" name="quantity"   		   value="<?php echo $quantity; ?>">
						<input type="hidden" name="total"   		   value="<?php echo $total; ?>">
						<input type="hidden" name="first_name" 		   value="<?php echo $first_name; ?>">
						<input type="hidden" name="last_name"  		   value="<?php echo $last_name; ?>">
						<input type="hidden" name="email"      		   value="<?php echo $email; ?>">
						<input type="hidden" name="delivery_method_id" value="<?php echo $delivery_method_id; ?>">
						<input type="hidden" name="address1"      	   value="<?php echo $address1; ?>">
						<input type="hidden" name="address2"      	   value="<?php echo $address2; ?>">
						<input type="hidden" name="city"      	       value="<?php echo $city; ?>">
						<input type="hidden" name="state"      	       value="<?php echo $state; ?>">
						<input type="hidden" name="zip"      	       value="<?php echo $zip; ?>">
						<input type="hidden" name="country_id"         value="<?php echo $country_id; ?>">



						<div class="form-group">
							<label for="cardNumber">Card Number</label><br>
							<span class="text-success small"><em>(Enter card number without space or hyphens)</em></span>
							<input type="text" class="form-control" autocomplete="off" id="cardNumber">
						</div><!-- .form-group -->

						<div class="form-group">
							<label for="cvc">CVC</label><br>
							<span class="text-success small"><em>(It is the 3 or 4 digits printed on a small print at the back of your card)</em></span>
							<input type="text" class="form-control shortInputs" id="cvcNumber" autocomplete="off" id="cvc" maxlength="4">
						</div><!-- .form-group -->

						<div class="form-inline">
							<p><b>Expiration (MM/YYYY)</b></p>
							
							<label for="expMonth" class="sr-only">Expiration Month</label>
							<input type="text" id="expMonth" class="form-control shortInputs" autocomplete="off" maxlength="2" placeholder="MM"> / 
							<label for="expYear" class="sr-only">Expiration Year</label>
							<input type="text" id="expYear" class="form-control shortInputs" autocomplete="off" maxlength="4" placeholder="YYYY">
						</div><!-- .form-inline -->

						<div class="form-group">
							<input type="submit" name="debit_submit" id="debitSubmit" value="SUBMIT" class="btn btn-success btn-block">
						</div><!-- .form-group -->
					</form>
				</div><!-- #debitCard -->


				<div class="tab-pane" id="paypal">
					Paypal Method
				</div><!-- #paypal -->

				<div class="tab-pane" id="payson">
					Payson Method
				</div><!-- #payson -->

				<div class="tab-pane" id="klarna">
					Klarna Method
				</div><!-- #paypal -->
			</div><!-- .tab-content -->
		</div><!-- .col-sm-8 -->

	</div><!-- .row -->

	<hr>

	<div class="row">
		<div class="col-sm-12 text-center">
			<a href="#" class="h1"><span class="fa fa-facebook-square"></span> </a>
			<a href="#" class="h1"><span class="fa fa-twitter-square"></span> </a>
			<a href="#" class="h1"><span class="fa fa-google-plus-square"></span> </a>
			<a href="#" class="h1"><span class="fa fa-youtube-square"></span> </a>
		</div>
	</div>
	
</main>

<?php include_once('layout/footer.inc.php'); ?>
<script type="text/javascript" src="js/buy.js"></script>
<?php $page_title = "buy"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<!-- 
<script type="text/javascript">Stripe.setPublishableKey(STRIPE_PUBLISHABLE_KEY);</script>
 -->
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="delivery.php">Delivery</a></li>
			<li><a href="payment.php">Payment</a></li>
			<li class="active"><a href="buy.php"></a>Buy</li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle">
			Purchase Your Ticket
			<span class="pull-right">Step 4 of 4 </span>
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row">
		
		<!-- LEFT PART -->
		<!-- Event and Ticket Price Summary Section -->
		<div class="col-sm-4" id="checkoutSummary">
			<?php include_once('layout/buy_summary.inc.php'); ?>
		</div><!-- .col-sm-4 -->

		
		<!-- Delivery Method Summary  -->
		<div class="col-sm-8">
			<div id="deliverySummary">
				<h4>Delivery Method</h4>
				<h5><?php echo ucwords(Delivery::get_method($delivery_method_id)->name); ?></h5>

				<hr>

				<h4>Delivery Address</h4>
					<?php echo isset($address1) ? ucwords($address1) . "<br>" : null; ?>
					<?php echo isset($address2) ? ucwords($address2) . "<br>" : null; ?>
					<?php echo isset($city) ? ucwords($city) : null; ?>
					<?php echo isset($state) ? ", " . ucwords($state) . "<br>" : "<br>"; ?>
					<?php echo isset($zip) ? $zip . "<br>" : null; ?>
					<?php echo isset($country_id) ? ucwords($country->get_country_name()) . "<br>" : null; ?>
			</div><!-- #deliverySummary -->
			
			
			<form action="buy.php" method="POST">

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
				<input type="hidden" name="token"    		   value="<?php echo $token; ?>"

				

				<div class="form-group">
					<input type="submit" name="buy_submit" value="Buy" class="btn btn-success btn-block">
				</div>
			</form>
		</div><!-- .col-sm-4 -->


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
<!-- <script type="text/javascript" src="js/buy.js"></script> -->
<?php $page_title = "delivery"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li class="active"><a href="delivery.php">Delivery</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle">
			Delivery 
			<span class="pull-right">Step 2 of 4 </span>
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row">
		
		<!-- LEFT PART -->
		<!-- Event and Ticket Price Summary Section -->
		<div class="col-sm-4" id="checkoutSummary">
			<div class="checkoutSummaryTitle">
				<h1 class="h3"><?php echo ucwords($event->name); ?></h1>
			</div><!-- .checkoutSummaryTitle -->

			<div class="checkoutSummaryTime">
				<h4><?php echo date("D M d, Y H:i", $event->date); ?></h4>
				<h5><span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($event->venue); ?>, <?php echo strtoupper($event->city); ?> <?php echo strtoupper($event->country); ?></h5>
			</div><!-- .checkoutSummaryTime -->

			<div class="checkoutSummaryTicket">
				<ul class="list-unstyled">
					<li><b>Ticket Type</b>  <span class="pull-right"><?php echo ucwords($ticket->package); ?></span></li>
					<li><b>Price Per Ticket</b>  <span class="pull-right"><?php echo $currency->convert($ticket->price); ?> <em><?php echo $currency->code ?></em></span></li>
					<li><b>Number of Tickets (<a href="#">Edit</a>)</b>  <span class="pull-right">x <?php echo $quantity; ?></span></li>
					<li class="subtotal"><b>SUBTOTAL</b>  <span class="pull-right"><b><?php echo $currency->code; ?> <?php echo $currency->convert($sub_total); ?></b></span></li>
				</ul>
				<p class="footnote"><span class="fa fa-exclamation-circle"></span> Price does NOT include VAT and delivery.</p>
			</div><!-- .checkoutSummaryTicket -->

			
		</div><!-- .col-sm-4 -->


		
		<!-- User Checkout Info - Right Part -->
		<div class="col-sm-8">
			<form action="payment.php" name="delivery_form" id="deliveryForm" method="POST">
				<!-- Hidden Values -->
				<input type="hidden" name="event_id"   value="<?php echo $event->id; ?>">
				<input type="hidden" name="ticket_id"  value="<?php echo $ticket->id; ?>">
				<input type="hidden" name="quantity"   value="<?php echo $quantity; ?>">
				<input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
				<input type="hidden" name="last_name"  value="<?php echo $last_name; ?>">
				<input type="hidden" name="email"      value="<?php echo $email; ?>">


				<h2>Choose Delivery Method</h2>

				<div class="form-group-container">
					<div class="form-group">
						<label for="deliveryMethod" class="sr-only">Delivery Method</label>
						<select name="delivery_method_id" id="deliveryMethod" class="form-control">
							<?php while($delivery = $all_delivery->fetch_object()): ?>
								<option value="<?php echo Delivery::get_method($delivery->id)->id; ?>">
									<?php echo Delivery::get_method($delivery->id)->name; ?>
									&nbsp;
									<span class="small">(<?php echo Delivery::get_method($delivery->id)->price_per_ticket; ?> SEK per ticket)</span>
								</option>
							<?php endwhile; ?>
						</select>
					</div><!-- .form-group -->
				</div><!-- .form-group-container -->

				

				<h2>Enter Your Delivery Address</h2>
				<div class="form-group-container">
					<div class="form-group">
						<label for="address1">Address 1</label>
						<input type="text" name="address1" id="address1" class="form-control">
					</div><!-- .form-control -->

					<div class="form-group">
						<label for="address2">Address 2</label>
						<input type="text" name="address2" id="address2" class="form-control">
					</div><!-- .form-control -->

					<div class="form-group">
						<label for="city">City</label>
						<input type="text" name="city" id="city" class="form-control">
					</div><!-- .form-control -->

					<div class="form-group">
						<label for="state">State</label>
						<input type="text" name="state" id="state" class="form-control">
					</div><!-- .form-control -->

					<div class="form-group">
						<label for="zip">ZIP Code</label>
						<input type="text" name="zip" id="zip" class="form-control">
					</div><!-- .form-control -->


					<div class="form-group">
						<label for="country">Country</label>
						<select name="country_id" id="country" class="form-control">
							<option> --Choose Country--</option>
							<?php while($current_country = $all_countries->fetch_object()): ?>
							<?php $country = new Country($current_country->id); ?>
								<option value="<?php echo $country->country_id; ?>" <?php echo $country->country_id == 210 ? "selected='selected'" : ""; ?>>
									<?php echo $country->country_name; ?>
								</option>
							<?php endwhile; ?>
						</select>
					</div><!-- .form-group -->
					
				</div><!-- .form-group-container -->

				<div class="form-group">
					<input type="submit" name="delivery_submit" value="Continue" class="btn btn-success btn-block">
				</div><!-- .form-group -->

			</form>
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
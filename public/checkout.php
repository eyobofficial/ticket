<?php $page_title = "checkout"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active"><a href="checkout.php">Checkout</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle">
			Payment Checkout  
			<span class="pull-right">Step 1 of 4 </span>
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
			<ul class="nav nav-tabs">
				<li role="presentation" class="active">
					<a href="#guestCheckout" data-toggle="tab">Guest Checkout (No Account Required)</a>
				</li>

				<li role="presentation">
					<a href="#userCheckout" data-toggle="tab">Checkout By Loggin in</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane <?php echo !empty($errors['login']) ? '' : 'active'; ?>" id="guestCheckout">

					<!-- Form registration error, if any -->
					<?php if(!empty($errors['guest'])): ?>
						<div class="errorMsg">
							
							<ul>
								<?php foreach($errors['guest'] as $error_key => $error): ?>
									<li><?php echo ucfirst($error); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>


					<form action="checkout.php" name="guest_form" method="POST" id="guestForm">
						<!-- Hidden Values -->
						<input type="hidden" name="event_id" value="<?php echo $event->id; ?>">
						<input type="hidden" name="ticket_id" value="<?php echo $ticket->id; ?>">
						<input type="hidden" name="quantity" value="<?php echo $quantity; ?>">


						<div class="form-group">
							<label for="firstName">First Name: </label>
							<input type="text" name="first_name" id="firstName" class="form-control" placeholder="John">
						</div><!-- .form-group -->

						<div class="form-group">
							<label for="lastName">Last Name: </label>
							<input type="text" name="last_name" id="lastName" class="form-control" placeholder="Doe">
						</div><!-- .form-group -->
		
						
						<div class="form-group" id="guestEmail">
							<label for="email">Email: </label>
							<input type="email" name="email" id="email" placeholder="johndoe@example.com" class="form-control">
						</div><!-- .form-group -->

						<div class="checkbox">
							<label>
								<input type="checkbox" name="update_me" value="1" checked="checked">
								&nbsp; Please update me with the latest news, great deals, and special offers
							</label>
						</div><!-- .checkbox -->
						
						<div class="form-group">
							<input type="submit" name="guest_submit" value="Continue" class="btn btn-success btn-block">
						</div><!-- .form-group -->
					</form>
				</div><!-- #guestCheckout -->


				<div class="tab-pane <?php echo !empty($errors['login']) ? 'active' : ''; ?>" id="userCheckout">

					<!-- Form registration error, if any -->
					<?php if(!empty($errors['login'])): ?>
						<div class="errorMsg">
							
							<ul>
								<?php foreach($errors['login'] as $error_key => $error): ?>
									<li><?php echo ucfirst($error); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>


					<form action="checkout.php" name="loggin" method="POST" id="logginCheckoutForm">
						<!-- Hidden Values -->
						<input type="hidden" name="event_id" value="<?php echo $event->id; ?>">
						<input type="hidden" name="ticket_id" value="<?php echo $ticket->id; ?>">
						<input type="hidden" name="quantity" value="<?php echo $quantity; ?>">


						<div class="form-group">
							<label for="email2">Email or email</label>
							<input type="text" name="email" id="email2" class="form-control" placeholder="johndoe@example.com">
						</div><!-- .form-group -->

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="********">
						</div><!-- .form-group -->

						<div class="form-group">
							<input type="submit" name="login_submit" value="Log In" class="btn btn-success btn-block">
						</div><!-- .form-group -->
					</form>

					<ul class="text-right list-unstyled">
						<li><a href="#">Forget your password?</a></li>
						<li><a href="#">Register</a></li>
					</ul>
				</div><!-- #guestCheckout -->
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
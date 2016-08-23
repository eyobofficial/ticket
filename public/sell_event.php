<?php $page_title = "sell events"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="sell.php">Sell Ticketss</a></li>
			<li>
				<a href="sell_event.php?id=<?php echo $event->id; ?>">
					<b><?php echo ucwords($event->name); ?></b>
				</a>
			</li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8 text-left">
			Sell Your Tickets
		</h2>
	</div><!-- .eventHeader -->
	
	<div class="row">
		<!-- LEFT SIDE - TICKET DETAILS -->
		<div class="col-sm-8 sellTicketDetails">

			<!-- Form registration error, if any -->
			<?php if(!empty($errors)): ?>
				<div class="errorMsg">
					<p><span class="glyphicon glyphicon-warning-sign text-danger"></span>  Please fix the following: </p>
					<ul>
						<?php foreach($errors as $error_key => $error): ?>
							<li><?php echo ucfirst($error); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			
			<form action="sell_event.php?id=<?php echo $event->id; ?>" method="POST" id="sellTicketDetail" name="sell_ticket_detail">
				<input type="hidden" name="event_id" value="<?php echo $event_id; ?>">

				<!-- SEATTING DETAILS -->
				<div>
					<h3>Ticket Packages:</h3>
					<div class="form-container">
						<div class="form-group sellSeating">

							<label for="customSeating">Seating or Package Name:	</label>

							<input type="text" name="custom_seating" id="customSeating" class="form-control" value="<?php echo ucwords(htmlentities($ticket_name)); ?>">
						</div><!-- .form-group -->
					</div><!-- .form-container -->
				</div>
				
				

				<!-- TICKET NUMBER -->
				<div>
					<h3>Ticket Number: </h3>
					<div class="form-container">
						<div class="form-group">
							<label for="ticketNumber" class="sr-only">Ticket Number: </label>
							<select name="ticket_number" id="ticketNumber" class="form-control">
								<?php for($count = 1; $count <= 30; $count++): ?>
									<option value="<?php echo $count; ?>">
										<?php echo $count; ?>
									</option>
								<?php endfor; ?>
							</select>
						</div><!-- .form-group -->

					</div><!-- .form-container -->
				</div>
				
				
				<!-- TICKET PRICE -->
				<div>
					<h3>Ticket Price: </h3>
					<div class="form-container">
						<p>* <em>Prices are per ticket</em></p>
						<div class="row">
							<div class="form-group col-sm-4">
								<select name="ticket_currency" id="ticketCurrency" class="form-control">
									<option><?php echo $currency->code; ?></option>
								</select>
							</div>

							<div class="form-group col-sm-8">
								<input type="text" id="ticketPrice" name="ticket_price" placeholder="Price" class="form-control" value="<?php echo ucwords(htmlentities($ticket_price)); ?>">
							</div>
						</div><!-- .row -->
					</div><!-- .form-container -->
				</div>
				
				<div class="form-group">
					<input type="submit" name="submit" value="Continue" class="btn btn-success btn-block">
				</div>
			
			</form>
		</div><!-- .col-sm-8 -->


		<!-- RIGHT SIDE - EVENT SUMMARY -->
		<div class="col-sm-4">
			<h2 class="h3">Event Summary</h2>
			<div class="sellEventSummary panel panel-default">
				<div class="panel-heading">
					<a href="event.php?id=<?php echo urlencode($event->id); ?>"><h2 class="h4"><?php echo ucwords($event->name); ?></h2></a>
				</div><!-- .panel-heading -->

				<img src="pictures/event_photos/<?php echo $event->photo; ?>" alt="<?php echo $event->name; ?>" class="img-responsive">

				<div class="panel-footer">
					<p><span class="glyphicon glyphicon-calendar"></span> <?php echo date("d, F", $event->date);  ?></p>

					<p><span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($event->venue) . ", " . ucwords($event->city);  ?></p>
				</div>
			</div><!-- .sellEventSummary
			
		</div><!-- .col-sm-4 -->

	</div><!-- .row -->

</main>

	


<?php include_once('layout/footer.inc.php'); ?>
<?php $page_title = "event"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="concerts.php"><?php echo ucwords($event->type()); ?></a></li>
			<li class="active"><a href="event.php?id=<?php echo (int)($event->id); ?>"><?php echo ucwords($event->name); ?></a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8">
			<?php echo ucwords($event->name); ?>
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row">
		<div class="col-sm-3">
			<img src="pictures/event_photos/<?php echo $event->photo; ?>" alt="<?php echo $event->name; ?>" class="fullEventPhoto">

			<div class="eventSummary">
				<ul class="list-unstyled">
					<li><span class="glyphicon glyphicon-calendar text-success"></span> <?php echo date("H:i a M d, Y", $event->date); ?></li>
					<li>
						<span class="glyphicon glyphicon-map-marker text-success"></span> 
						<?php echo ucwords($event->venue); ?>, <?php echo strtoupper($event->city); ?>
					</li>
				</ul>
			</div><!-- .eventSummary -->
		</div><!-- .col-sm-12 -->

		<div class="col-sm-7 text-left">
			<?php if(empty($event->overview)): ?>
			<p class="text-center"><span class="fa fa-exclamation-circle"></span> There is no descripition of this event.</p>
			<?php
				else: 
					echo ucwords($event->overview);
				endif; 
			?>
		</div>
	</div><!-- .row -->
	
	<hr>

	<div class="row">
		<div class="ticketList col-sm-6">
			<h4 class="subheadings">Tickets</h4>

			<div class="table-responsive">
				<?php if(isset($tickets) && $tickets->num_rows > 0): ?>
				<table class="table table-bordered table-condensed table-striped table-hover">
				<?php while($current_ticket = $tickets->fetch_object()): ?>
				<?php $ticket = new Ticket($current_ticket->id); ?>
					<tr>
						<td><strong><?php echo $ticket->package; ?></strong></td>
						<td class="text-right"><strong><?php echo $currency->convert($ticket->price);  ?> <?php echo $currency->code; ?></strong></td>
						<td class="text-center">
							<em>
								<?php echo isset($ticket->available) && $ticket->available <= 50 ? $ticket->available : "20+"; ?> Left</em>
							&nbsp; &nbsp;
						</td>

						<td class="text-center">
						<form action="event.php" method="POST">
							<!-- Hidden Values -->
							<input type='hidden' name="event_id" value="<?php echo $event->id; ?>">
							<input type='hidden' name="ticket_id" value="<?php echo $ticket->id; ?>">

							<label for="quantity">Qty:</label>
							<select name="quantity" id="quantity">
								<?php $ticket_number = ($ticket->available < 30) ? $ticket->available : 30; ?>
								<?php for($i = 1; $i <= $ticket_number; $i++): ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php endfor; ?>
							</select>
							
						</td>
						
						<td class="text-center">
							<!-- <button type="submit" name="add_to_cart" class="btn btn-success btn-xs">	
								<b><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</b>
							</button> -->
							<button type="submit" name="buy_now" class="btn btn-danger btn-xs">	
								<b> Buy Now</b>
							</button>
						</td>

						<!-- <td>
							<button type="submit" name="add_to_cart" class="btn btn-success btn-xs">	
								<b><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</b>
							</button>
						</td> -->


						</form><!-- End Form -->
					</tr>
				<?php endwhile; ?>
				</table>
				<?php else: ?>
					<p class="noticeMsg text-center"><span class="fa fa-exclamation-circle"></span>  No ticket package is available </p>
				<?php endif; ?>
			</div><!-- .table-responsive -->
		</div><!-- .ticketListing -->

		<!-- SEATTING POSITION PHOTO -->
		<div class="col-sm-6">
			<h4 class="subheadings text-right"> Seating Map </h4>

			<div class="seatingPhoto text-center">
				<img src="pictures/event_photos/<?php echo $event->seating_photo; ?>" alt="<?php echo $event->name; ?>"  class="img-responsive">
			</div>
			
		</div>

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
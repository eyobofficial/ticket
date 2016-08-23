<?php $page_title = "sell tickets"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="sell.php"><b>Sell Ticketss</b></a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8 text-left">
			Sell Your Tickets
		</h2>
	</div><!-- .eventHeader -->

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h3 class="text-center searchHeader">Look for an event here: </h3>

			<form action="search_sell.php" method="GET" name="sell_search" id="sellSearch">
				<div class="form-group">
					<div class="input-group">
						<label for="searchEvent" class="sr-only">Search</label>
						<input type="search" name="q" id="searchEvent" class="form-control" placeholder="Event Name Of Your Ticket">

						<span class="input-group-btn">
							<button class="btn btn-warning">Search</button>
						</span>
					</div>
				</div>
			</form>

			<h3 class="searchHeader text-center separator">OR</h3>
			<h3 class="searchHeader text-center">Choose a popular event from below:</h3>
		</div>
	</div><!-- .row -->

	<div class="row">
		<!-- POPULAR CONCERT EVENT -->
		<div class="col-sm-4">
			<div class="sellMenu sellMenuConcert">
				<h2 class="h4">POPULAR CONCERTS</h4>
				<ul class="list-unstyled">
					<?php while($current_event = $concert_events->fetch_object()): ?>
					<?php $event = new Event($current_event->id); ?>
						<a href="sell_event.php?id=<?php echo $event->id; ?>">
							<li><?php echo ucwords($event->name); ?></li>
						</a>
					<?php endwhile; ?>
				</ul>
			</div><!-- .sellMenuConcert -->
		</div><!-- .col-sm-4 -->

		<!-- POPULAR SPORT EVENT -->
		<div class="col-sm-4">
			<div class="sellMenu sellMenuSport">
				<h2 class="h4">POPULAR SPORT EVENTS</h4>
				<ul class="list-unstyled">
					<?php while($current_event = $sport_events->fetch_object()): ?>
					<?php $event = new Event($current_event->id); ?>
						<a href="sell_event.php?id=<?php echo $event->id; ?>">
							<li><?php echo ucwords($event->name); ?></li>
						</a>
					<?php endwhile; ?>
				</ul>
			</div><!-- .sellMenuConcert -->
		</div><!-- .col-sm-4 -->

		<!-- POPULAR FESTIVAL EVENT -->
		<div class="col-sm-4">
			<div class="sellMenu sellMenuFestival">
				<h2 class="h4">POPULAR FESTIVALS</h4>
				<ul class="list-unstyled">
					<?php while($current_event = $festival_events->fetch_object()): ?>
					<?php $event = new Event($current_event->id); ?>
						<a href="sell_event.php?id=<?php echo $event->id; ?>">
							<li><?php echo ucwords($event->name); ?></li>
						</a>
					<?php endwhile; ?>
				</ul>
			</div><!-- .sellMenuConcert -->
		</div><!-- .col-sm-4 -->


	</div><!-- .row -->

</main>

	


<?php include_once('layout/footer.inc.php'); ?>
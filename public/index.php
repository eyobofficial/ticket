<?php $page_title = "home"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>

<!-- Page Header -->
<header id="pageHeader" class="container-fluid">
	<div class="row">
		<div id="logoText" class="col-sm-4">
			<h1 class="text-warning" id="pageTitle"><a href="index.php"><?php echo ucwords(WEBSITE_NAME); ?></a></h1>
			<h2 class="small motto"><?php echo ucwords(TAGLINE); ?></h2>
		</div><!-- #logoText -->
		
		<!-- Top Navigation -->
		<nav class="col-sm-8 hidden-xs text-right" id="topNav">
			<?php if(isset($logged_user)): ?>

				<ul class="list-inline" id="register">
					<li><a href="account.php" title="<?php echo ucwords($logged_user->fullname); ?>">Hello, <?php echo ucwords($logged_user->fullname); ?></a></li>
					<li><a href="#" title="shopping cart"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</a></li>
					<li><a href="logout.php" title="logout">Logout</a></li>
				</ul>

			<?php else: ?>

				<ul class="list-inline" id="register">
					<li><a href="register.php" title="Register">Register</a></li>
					<li><a href="sell.php" title="sell your tickets">Sell Tickets</a></li>
					<li><a href="login.php" title="login">Login</a></li>
				</ul>

			<?php endif; ?>

			<ul class="list-inline" id="misc">
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="agreement.php">Terms &amp; Aggreements</a></li>
			</ul>
		</nav>
	</div><!-- .row -->
</header><!-- #pageHeader -->

<!-- Page Navigation -->
<?php include_once('layout/mainNav.inc.php'); ?>

<!-- Search Box -->
<div class="pageBanner">
	<div id="search" class="container">
		<form action="search_events.php" class="col-xs-12 col-sm-8 col-sm-offset-2 col-xs-offset-0" name="search" id="searchBox">
			<div class="input-group">
				<input type="search" name="q" placeholder="Search By Event Name, Venue Name or City Name" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-warning">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div><!-- .input-group -->
		</form>
	</div><!-- #search -->
</div><!-- .pageBanner -->

<!-- Main Section -->
<main role="main" class="container" id="main">
	<div class="row">
		<h2 class="h3 eventTypes" id="featuredTitle">Featured Events</h2>

		<!-- Featured Events -->
		<?php while($featured_event = $featured_events->fetch_object()): ?>
		<?php $featured = new Event($featured_event->id); ?>
			<section class="featured concert col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="panel panel-warning">
					<img class="preview img-responsive" src="pictures/event_photos/<?php echo $featured->photo; ?>" alt="<?php echo $featured->name; ?>">
					<div class="panel-body">
						<h4><a href="event.php?id=<?php echo $featured->id; ?>"><?php echo ucwords($featured->name); ?></a></h4>
						<div class="eventMeta">
							<a class="eventDate push-left"><span class="glyphicon glyphicon-calendar"></span> <?php echo date("M d", $featured->date); ?></a>

							<a class="pull-right"><span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($featured->venue); ?>, <?php echo strtoupper($featured->city); ?></a>
						</div><!-- .eventMeta -->
					</div><!-- .panel-body -->

					<div class="panel-footer">
						<a href="event.php?id=<?php echo $featured->id; ?>" class="btn btn-warning btn-sm">
						  <b><span class="glyphicon glyphicon-shopping-cart"></span> Buy Now</b>
						 </a>

						 <a href="event.php?id=<?php echo $featured->id; ?>" class="btn btn-info btn-sm pull-right"><b>Read More</b></a>
					</div><!-- .panel-footer -->
				</div><!-- .panel -->
			</section><!-- .featured -->
		<?php endwhile; ?>
	</div><!-- .row -->


	<div class="text-center moreEvent">
		<a href="featured.php" type="button" class="btn btn-warning moreEvent">More Featured Events</a>
	</div><!-- moreEvent -->

	<div class="row">
		<h2 class="h3 eventTypes" id="concertTitle">Recent Events</h2>

		<!-- All Recent Events -->
		<?php while($recent_event = $recent_events->fetch_object()): ?>
		<?php $recent = new Event($recent_event->id); ?>
			<section class="recent col-sm-3 col-md-4 col-sm-6">	
				<div class="eventContainer">
					<a href="event.php?id=<?php echo $recent->id; ?>">
					<img src="pictures/event_photos/<?php echo $recent->photo; ?>" alt="<?php echo $recent->name; ?>" class="img-responsive eventPrev thumbnail">

					<div class="eventMeta">
						<h2 class="h4"> <?php echo ucwords($recent->name); ?></h2>

						<div class="eventMetaBody">
							<a class="eventDate push-left">
								<span class="glyphicon glyphicon-calendar"></span> <?php echo date("M d", $recent->date); ?>
							</a>
						
							<a class="pull-right text-success">
								<span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($recent->city); ?>
							</a>
						</div><!-- .eventMetaBody -->

					</div><!-- .eventMeta -->
					</a>
				</div><!-- .eventContainer -->
			</section><!-- .recent -->
		<?php endwhile; ?>

	</div><!-- .row -->

	<div class="text-center moreEvent">
		<a href="events.php" type="button" class="btn btn-warning moreEvent">More Recent Events</a>
	</div><!-- moreEvent -->
</main>
		
<?php include_once('layout/footer.inc.php'); ?>
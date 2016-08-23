<?php $page_title = "contact us"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8">
			<?php echo ucwords($page_title); ?>
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row">

		<div class="col-sm-3">
			<div class="form-group-container contact-container">
				<h4 class="h1 text-center"><span class="fa fa-comment"></span></h4>

				<h2 class="text-center"><a href="register.php">Message Us</a></h2>
			</div>
		</div><!-- .col-sm-3 -->



		<div class="col-sm-3">
			<div class="form-group-container contact-container">
				<h4 class="h1 text-center"><span class="fa fa-phone"></span></h4>

				<h2 class="text-center">Call Us</h2>
				<h4 class="text-center"><?php echo PHONE; ?></h4>
			</div>
		</div><!-- .col-sm-3 -->


		<div class="col-sm-3">
			<div class="form-group-container contact-container">
				<h4 class="h1 text-center"><span class="fa fa-envelope-o"></span></h4>

				<h2 class="text-center"><a href="mailto:<?php echo EMAIL; ?>">Email Us</a></h2>
			</div>
		</div><!-- .col-sm-3 -->



		<div class="col-sm-3">
			<div class="form-group-container contact-container">
				<h4 class="h1 text-center"><span class="fa fa-facebook"></span></h4>

				<h2 class="text-center"><a href="<?php echo FACEBOOK; ?>">Follow Us</a></h2>
			</div>
		</div><!-- .col-sm-3 -->
		
		

	



		


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
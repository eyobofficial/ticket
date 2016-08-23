<?php $page_title = "register"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active"><a href="register.php">Register</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8">
			Register
		</h2>
		
	</div><!-- .eventHeader -->
		
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 registerForm">

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
			
			
			<div class="form-group-container">
				<form action="register.php" method="POST" id="registerForm" name="register_form">
					<div class="form-group">
						<label for="firstName">First Name:</label>
						<input type="text" name="first_name" id="firstName" class="form-control" placeholder="" value="<?php echo ucwords(htmlentities($first_name)); ?>">
					</div><!-- .form-group -->

					<div class="form-group">
						<label for="lastName">Last Name:</label>
						<input type="text" name="last_name" id="lastName" class="form-control" placeholder="" value="<?php echo ucwords(htmlentities($last_name)); ?>">
					</div><!-- .form-group -->

					<div class="form-group">
						<label for="email">Your Email:</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="" value="<?php echo ucwords(htmlentities($email)); ?>">
					</div><!-- .form-group -->

					<div class="form-group">
						<label for="password1">Choose Password:</label>
						<input type="password" name="password1" id="password1" class="form-control" placeholder="" value="">
					</div><!-- .form-group -->


					<div class="form-group">
						<label for="password2">Confirm Password:</label>
						<input type="password" name="password2" id="password2" class="form-control" placeholder="" value="">
					</div><!-- .form-group -->

					<div class="form-group">
						<input type="submit" name="register" value="SUBMIT" class="btn btn-success btn-block">
					</div><!-- .form-group -->
				</form>
				<p class="text-right small"><span class="shade">Do you already have an account?</span> <a href="login.php" title="login here">Login Here</a></p>
			</div><!-- .form-group-container -->
			
		</div>
	</div><!-- .row -->

	<hr>
	
</main>

	







<?php include_once('layout/footer.inc.php'); ?>
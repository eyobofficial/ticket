<?php $page_title = "login"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	
<h1 class="sr-only">
	Register
</h1>
		

		
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 login-form-container">

			<!-- Form registration error, if any -->
			<?php if(!empty($errors)): ?>
				<div class="errorMsg">
					
					<ul>
						<?php foreach($errors as $error_key => $error): ?>
							<li><?php echo ucfirst($error); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>



			<div class="form-group-container">
				<form action="login.php" method="POST" id="loginForm" name="login_form">
				<fieldset>
					<legend>Login</legend>

					<div class="form-group">
						<label for="email"><span class="fa fa-user"></span> Email:</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="" value="<?php echo htmlentities($email); ?>">
					</div><!-- .form-group -->

					<div class="form-group">
						<label for="password"><span class="fa fa-lock"></span> Password:</label>
						<input type="password" name="password" id="password" class="form-control" value="">
					</div><!-- .form-group -->

					<div class="form-group">
						<input type="submit" name="login" value="SUBMIT" class="btn btn-success btn-block">
					</div><!-- .form-group -->
				</fieldset>
				</form>

				<p class="text-right small"><span class="shade">You don't have an account?</span> <a href="register.php" title="register here">Register Here</a></p>
			</div><!-- .form-group-container -->
			
		</div>
	</div><!-- .row -->

	<hr>
	
</main>

	







<?php include_once('layout/footer.inc.php'); ?>
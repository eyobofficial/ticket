<?php //session_start(); ?>
<?php $page_context = "admin"; ?>
<?php $page_title = "login"; ?>
<?php require_once('../../includes/intialize.inc.php'); ?>
<?php include_once(SITE_ROOT . DS . 'public/layout/head.admin.login.php'); ?>

<main role="main" id="adminLogin" class="container">
	
		
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 login-form-container">

		<!-- Form registration error, if any -->
		<?php if(!empty($errors)): ?>
			<div class="errorLogin">
				
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
				<legend>
					<h1 class="text-warning text-center">Nordic</h1>
				</legend>

				<div class="form-group">
					<label for="email"><span class="fa fa-user"></span> Email/Username:</label>
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

			<p class="text-center small"><span class="shade">Go to </span> <a href="../index.php" target="_blank" title="register here">website</a></p>

		</div><!-- .form-group-container -->
		
	</div>
</div><!-- .row -->

</main>


<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
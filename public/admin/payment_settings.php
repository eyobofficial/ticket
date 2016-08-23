<?php $page_context = "admin"; ?>
<?php $page_title = "payment methods"; ?>
<?php $page_section = "manage settings"; ?>
<?php require_once('../../includes/intialize.inc.php'); ?>
<?php include_once(SITE_ROOT . DS . 'public/layout/head.admin.php'); ?>

<main class="container-fluid">
	<div class="row">
		<section class="col-sm-2" id="adminNav">
			
			<!-- Include page navigation -->
			<?php include_once('layout/nav.admin.php'); ?>

		</section><!-- .col-sm-2 -->


		<section class="col-sm-10" id="adminMain">
			<div class="row">
				<section class="col-sm-8">

					<header>
						<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> Payment Method Settings</h1>
					</header>


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



					<form action="add_admin.php" method="POST" name="add_admin" id="addAdmin">
						<div class="form-group-container add-admin-container">
						<fieldset>
							<legend><span class="fa fa-cc-stripe"></span> Stripe Payment Gateway</legend>

							<!-- STRIPE PUBLISHABLE KEY -->
							<div class="form-group">
								<label for="stripePublishableKey">Stripe Publishable Key: </label>
								<input type="text" name="stripe_publishable_key" id="stripePublishableKey" class="form-control" value="<?php //echo htmlentities(ucwords($first_name));  ?>">
							</div><!-- .form-group -->


							<!-- STRIPE SECRET KEY -->
							<div class="form-group">
								<label for="stripeSecretKey">Stripe Publishable Key: </label>
								<input type="text" name="stripe_secret_key" id="stripeSecretKey" class="form-control" value="<?php //echo htmlentities(ucwords($first_name));  ?>">
							</div><!-- .form-group -->


						</fieldset>
						</div><!-- .form-group-container -->

						<hr>


						<div class="form-group-container add-admin-container">
						<fieldset>
							<legend>Enter Password To Confirm</legend>

							<!-- PASSWORD -->
							<div class="form-group">
								<label for="password">Password: </label>
								<input type="password" name="password" id="password" class="form-control">
							</div><!-- .form-group -->


						</fieldset>
						</div><!-- .form-group-container -->

						
						<!-- Submit Button -->
						<div class="form-group">
							<input type="submit" name="submit" value="Create Admin" class="btn btn-success btn-block">
						</div><!-- .form-group -->

					</form>

				</section><!-- .col-sm-8 -->
	
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>

<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
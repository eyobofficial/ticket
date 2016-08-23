<?php $page_context = "admin"; ?>
<?php $page_title = "account settings"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> Acount Settings</h1>
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



					<form action="account_settings.php" method="POST" name="account_settings" id="accountSettings">
						<div class="form-group-container add-admin-container">
						<fieldset>
							<legend>Account Details</legend>

							<!-- FIRST NAME -->
							<div class="form-group">
								<label for="firstName">First Name: </label>
								<input type="text" name="first_name" id="firstName" class="form-control" value="<?php echo htmlentities(ucwords($first_name));  ?>">
							</div><!-- .form-group -->


							<!-- LAST NAME -->
							<div class="form-group">
								<label for="lastName">Last Name: </label>
								<input type="text" name="last_name" id="lastName" class="form-control" value="<?php echo htmlentities(ucwords($last_name)); ?>">
							</div><!-- .form-group -->


							<!-- EMAIL -->
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="text" name="email" id="email" class="form-control" value="<?php echo htmlentities(strtolower($email)); ?>">
							</div><!-- .form-group -->

						</fieldset>
						</div><!-- .form-group-container -->
						
						<!-- Submit Button -->
						<div class="form-group">
							<input type="submit" name="submit" value="update" class="btn btn-success btn-block">
						</div><!-- .form-group -->

					</form>

				</section><!-- .col-sm-8 -->
	
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>

<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
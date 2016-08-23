<?php $page_context = "admin"; ?>
<?php $page_title = "change password"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-lock"></span> Change Password</h1>
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



					<form action="change_password.php" method="POST" name="account_settings" id="accountSettings">
					
						<div class="form-group-container add-admin-container">
						<fieldset>
							<legend>Change Password</legend>

							<!-- OLD PASSWORD -->
							<div class="form-group">
								<label for="passwordOld">Old Password: </label>
								<input type="password" name="password_old" id="passwordOld" class="form-control">
							</div><!-- .form-group -->

							<!-- NEW PASSWORD 1 -->
							<div class="form-group">
								<label for="passwordNew1">New Password: </label>
								<input type="password" name="password_new_1" id="passwordNew1" class="form-control">
							</div><!-- .form-group -->


							<!-- NEW PASSWORD 2 -->
							<div class="form-group">
								<label for="passwordNew2">Confirm New Password: </label>
								<input type="password" name="password_new_2" id="passwordNew2" class="form-control">
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
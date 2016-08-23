<?php $page_title = "change password"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="account.php">User Account</a></li>
			<li class="active"><a href="password.php">Change Password</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8 text-left">
			Account Details
		</h2>
	</div><!-- .eventHeader -->
	
	<div class="row">
		
		<!-- LEFT SIDE - TICKET DETAILS -->
		<div class="col-sm-3" id="accountSidebar">
			<?php include_once('layout/acountsidebar.layout.php'); ?>
		</div><!-- .col-sm-4 -->



		<div class="col-sm-9">
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

			
			<form action="password.php" method="POST" name="account_settings" id="accountSettings">
			
				<div class="form-group-container add-admin-container">
				<fieldset>
					<legend><span class="fa fa-lock"></span> Change Password</legend>

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

		</div><!-- .col-sm-9 -->

	</div><!-- .row -->

</main>


<?php include_once('layout/footer.inc.php'); ?>
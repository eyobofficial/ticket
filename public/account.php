<?php $page_title = "account"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li class="active"><a href="account.php">User Account</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8 text-left">
			Account Details
		</h2>
	</div><!-- .eventHeader -->
	
	<div class="row">

		<!-- LEFT SIDE - ACCOUNT NAVIGATION-->
		<div class="col-sm-3" id="accountSidebar">
			<?php include_once('layout/acountsidebar.layout.php'); ?>
		</div><!-- .col-sm-4 -->




		<!-- RIGHT SIDE -->
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


			<form action="account.php" method="POST" name="account_settings" id="accountSettings">
				<div class="form-group-container add-admin-container account-detail-container">
				<fieldset>
					<legend><span class="fa fa-user"></span> User Info</legend>

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

				<p class="text-right small"><a href="password.php" title="register here">Change your password</a></p>

				</div><!-- .form-group-container -->
				
				<!-- Submit Button -->
				<div class="form-group">
					<input type="submit" name="submit" value="update" class="btn btn-success btn-block">
				</div><!-- .form-group -->

			</form>

		</div><!-- .col-sm-8 -->

	</div><!-- .row -->

</main>

	


<?php include_once('layout/footer.inc.php'); ?>
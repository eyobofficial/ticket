<?php $page_title = "send message"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="account.php">User Account</a></li>
			<li class="active"><a href="send_message.php">Send Message</a></li>
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


			<form action="send_message.php" method="POST" name="add_admin" id="addAdmin">
				<div class="form-group-container add-admin-container">
				<fieldset>

					<!-- SUBJECT-->
					<div class="form-group">
						<label for="subject">Subject: </label>
						<input type="text" name="subject" id="subject" class="form-control" value="<?php echo htmlentities(ucwords($subject));  ?>">
					</div><!-- .form-group -->


					<!-- MESSAGE TEXT -->
					<div class="form-group">
						<label for="text">Message: </label>
						<textarea name="text" id="text" rows="10" class="form-control"><?php echo htmlentities($text); ?></textarea>
					</div><!-- .form-group -->

				</fieldset>
				</div><!-- .form-group-container -->

				<div class="form-group text-right">
					<input type="submit" name="submit" value="Send" class="btn btn-success">
				</div><!-- .form-group -->

			</form>

		</div><!-- .col-sm-8 -->

	</div><!-- .row -->

</main>

	


<?php include_once('layout/footer.inc.php'); ?>
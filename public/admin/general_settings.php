<?php $page_context = "admin"; ?>
<?php $page_title = "general settings"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> General Settings</h1>
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



					<form action="general_settings.php" method="POST" name="add_admin" id="addAdmin">
						<div class="form-group-container add-admin-container">
						<fieldset>
							<legend>Website Settings</legend>

							<!-- SITE TITLE -->
							<div class="form-group">
								<label for="siteTitle">Site Title: </label>
								<input type="text" name="site_title" id="siteTitle" class="form-control" value="<?php echo htmlentities(ucwords($title));  ?>">
							</div><!-- .form-group -->


							<!-- TAGLINE -->
							<div class="form-group">
								<label for="tagLine">Tagline: </label>
								<input type="text" name="tagline" id="tagline" class="form-control" value="<?php echo htmlentities(ucwords($tagline)); ?>">
							</div><!-- .form-group -->


							<!-- EMAIL -->
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="text" name="email" id="email" class="form-control" value="<?php echo htmlentities(strtolower($email)); ?>">
							</div><!-- .form-group -->


							<!-- PHONE -->
							<div class="form-group">
								<label for="phone">Phone: </label>
								<input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlentities($phone); ?>">
							</div><!-- .form-group -->

						</fieldset>
						</div><!-- .form-group-container -->

						<hr>


						<div class="form-group-container add-admin-container">
						<fieldset>
							<legend>Social Media</legend>

							<!-- FACEBOOK -->
							<div class="form-group">
								<label for="facebook"><span class="fa fa-facebook"></span> Facebook: </label>
								<input type="text" name="facebook" id="facebook" class="form-control" value="<?php //echo htmlentities(ucwords($facebook));  ?>">
							</div><!-- .form-group -->


							<!-- TWITTER -->
							<div class="form-group">
								<label for="twitter"><span class="fa fa-twitter"></span> Twitter: </label>
								<input type="text" name="twitter" id="twitter" class="form-control" value="<?php //echo htmlentities(ucwords($twitter));  ?>">
							</div><!-- .form-group -->


							<!-- YOUTUBE -->
							<div class="form-group">
								<label for="youtube"><span class="fa fa-youtube"></span> Youtube: </label>
								<input type="text" name="youtube" id="youtube" class="form-control" value="<?php //echo htmlentities(ucwords($youtube));  ?>">
							</div><!-- .form-group -->


							

						</fieldset>
						</div><!-- .form-group-container -->

						
						<!-- Submit Button -->
						<div class="form-group">
							<input type="submit" name="submit" value="submit" class="btn btn-success btn-block">
						</div><!-- .form-group -->

					</form>

				</section><!-- .col-sm-8 -->
	
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>

<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
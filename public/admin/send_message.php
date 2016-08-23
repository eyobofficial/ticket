<?php $page_context = "admin"; ?>
<?php $page_title = "send message"; ?>
<?php $page_section = "manage messages"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-envelope"></span> Compose Message</h1>
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



					<form action="send_message.php?user_id=<?php echo htmlentities($user_id); ?>" method="POST" name="add_admin" id="addAdmin">
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
								<textarea name="text" id="text" rows="12" class="form-control"><?php echo htmlentities($text); ?></textarea>
							</div><!-- .form-group -->

						</fieldset>
						</div><!-- .form-group-container -->

						<div class="form-group text-right">
							<input type="submit" name="submit" value="Send" class="btn btn-success">
						</div><!-- .form-group -->

					</form>

				</section><!-- .col-sm-8 -->
	
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>

<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
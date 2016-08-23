<?php $page_context = "admin"; ?>
<?php $page_title = "add delivery"; ?>
<?php $page_section = "manage delivery"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> Add Delivery Method</h1>
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



					<form action="add_delivery.php" method="POST" name="add_admin" id="addAdmin">
						<div class="form-group-container add-admin-container">
						<fieldset>
							<legend>New Delivery Method</legend>

							<!-- DELIVERY METHOD NAME -->
							<div class="form-group">
								<label for="methodNAME">Delivery Method Type: </label>
								<input type="text" name="method_name" id="methodName" class="form-control" value="<?php echo htmlentities(ucwords($method_name));  ?>">
							</div><!-- .form-group -->


							<!-- PRICE -->
							<div class="form-group">
								<label for="price">Price per Ticket: </label>
								<input type="text" name="price" id="price" class="form-control" value="<?php //echo htmlentities(ucwords($price)); ?>">
							</div><!-- .form-group -->

						</fieldset>
						</div><!-- .form-group-container -->

						<div class="form-group">
							<input type="submit" name="submit" value="submit" class="btn btn-success btn-block">
						</div><!-- .form-group -->

					</form>

				</section><!-- .col-sm-8 -->
	
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>

<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
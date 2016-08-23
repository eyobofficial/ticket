<?php $page_context = "admin"; ?>
<?php $page_title = "currency rates"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-money"></span> Conversion Rates</h1>
					</header>


					<!-- Form registration error, if any -->
					<?php if(!empty($errors)): ?>
						<div class="errorMsg">
							<p><span class="glyphicon glyphicon-warning-sign text-danger"></span>  Please fix the following: </p>
							<ul>
								<?php foreach($errors as $error): ?>
									<li><?php echo ucfirst($error); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>



					<form action="currency.php" method="POST" name="account_settings" id="accountSettings">
					
						<div class="form-group-container add-admin-container">
						<fieldset>

							<h4>1.00 Swedish Krona(SEK) is equivalent to: </h4>

							<div class="currencyLists">
								<!-- CURRENCIES -->
								<?php while($currency = $all_currency->fetch_object()): ?>
								<?php if(strtoupper($currency->code) == 'SEK'){continue;} ?>
									<div class="form-group">
										<div class="form-inline">
											= <input type="text" name="rate[<?php echo $currency->code; ?>]" id="<?php echo $currency->code; ?>" class="form-control" value="<?php echo $currency->rate; ?>">
											<label for="usd"><?php echo $currency->code; ?> </label>
										</div><!-- .form-inline -->
									</div><!-- .form-group -->
								<?php endwhile; ?>

							</div><!-- .currencyLists -->

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
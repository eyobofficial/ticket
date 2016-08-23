<?php $page_context = "admin"; ?>
<?php $page_title = "delivery"; ?>
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
						<h2 class="h4 text-left actionTitle"> Delivery Method Info</h1>
					</header>

					<hr>

					<div class="form-group-container add-admin-container clearfix">
					

						<div class="table-responsive col-sm-6">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">Delivery Method Name: </span></td>
									<td><?php echo htmlentities(ucwords($delivery->name)); ?></td>
								</tr>


								<tr>
									<td><span class="bold">Price Per Ticket: </span></td>
									<td><?php echo htmlentities(ucwords($delivery->price_per_ticket)); ?> &nbsp; <span class="em">SEK</span></td>
								</tr>

							</table>

						</div><!-- .table-responsive -->


						<div class="col-sm-4">
							<div class="img-respnsive pull-right">
								
							</div>
						</div>

					</div><!-- .form-group-container -->

					<div class="text-right">
						<a href="edit_delivery.php?delivery_id=<?php echo ($delivery->id); ?>" title="Edit Delivery Method" class="btn btn-success"> 
							<span class="glyphicon glyphicon-edit"></span> Edit
						</a>


						<a onclick="return confirm('Are you sure want to delete this delivery method?');" href="delete_delivery.php?delivery_id=<?php echo ($delivery->id); ?>" title="Edit Delivery Method" class="btn btn-danger"> 
							<span class="glyphicon glyphicon-remove"></span> Delete
						</a>
					</div><!--.text-right -->


					
					
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
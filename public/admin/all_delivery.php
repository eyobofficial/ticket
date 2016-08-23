<?php $page_context = "admin"; ?>
<?php $page_title = "all delivery"; ?>
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
			<header>
				<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> All Admins</h1>
			</header>

			<hr>

			<section class="col-sm-6">
				<form action="all_events.php" method="POST" id="allEvents" name="all_events">
					<!-- <div class="row">
						<div class="form-inline col-sm-8 col-xs-12">
							<select name="bulk_action" class="form-control">
								<option selected="selected">--Choose bulk actions--</option>
								<option value="1">Publish</option>
								<option value="2">Unpublish</option>
								<option value="3">Make Featured</option>
								<option value="4">Move To Trash</option>
							</select>
					
							<input type="submit" name="submit" value="Apply" class="btn btn-default">
						</div>.form inline
					</div>.row -->
					
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed">
						
								
						<thead>
							<tr>
								<!-- <th></th> -->

								<th>Delivery Method</th>
								<th>Price Per Ticket <span class="small em">(SEK)</span></th>
								<th>Action</th>
							
							</tr>
						</thead>

						<tbody>
						
							<?php while($delivery = $all_delivery->fetch_object()): ?>
							<tr>
								<!-- <th>
									<input type="checkbox" name="delivery_id[]" value="<?php echo $delivery->id; ?>">
								</th> -->

								<td class="titleCol">
									<a href="delivery.php?delivery_id=<?php echo $delivery->id; ?>">
										<?php echo ucwords($delivery->name); ?>
									</a>
							
								</td>
								<td><?php echo strtolower($delivery->price_per_ticket); ?></td>
								<td>
									<a href="delivery.php?delivery_id=<?php echo ($delivery->id); ?>" title="View Delivery Method"><span class="fa fa-eye"></span> View </a> | 
									<a onclick="return confirm('Are you sure want to delete this delivery method?');" href="delete_delivery.php?delivery_id=<?php echo ($delivery->id); ?>" title="Edit Delivery Method"><span class="glyphicon glyphicon-trash"></span> Delete </a> |
									<a href="edit_delivery.php?delivery_id=<?php echo ($delivery->id); ?>" title="Edit Delivery Method"><span class="glyphicon glyphicon-edit"></span> Edit</a>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
						</form>
					</table>
				</div>
			</section>
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>


<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
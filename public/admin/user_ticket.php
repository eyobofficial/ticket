<?php $page_context = "admin"; ?>
<?php $page_title = "user ticket"; ?>
<?php $page_section = "manage tickets"; ?>
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
						<h2 class="h4 text-left actionTitle"> User Ticket Info</h1>
					</header>

					<hr>

					<div class="form-group-container add-admin-container clearfix">
					

						<div class="table-responsive col-sm-10">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">Package Name: </span></td>
									<td><?php echo htmlentities(ucwords($ticket->package)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Event: </span></td>
									<td><?php echo htmlentities(ucwords($event->name)); ?></td>
								</tr>


								<tr>
									<td><span class="bold">Price: </span></td>
									<td><?php echo htmlentities(ucwords($ticket->price)); ?> &nbsp; <span class="em">SEK</span></td>
								</tr>


								<tr>
									<td><span class="bold">Owner: </span></td>
									<td>
										<a class="shadeLink em" href="user.php?user_id=<?php echo htmlentities(strtolower($user->id)); ?>">
											<?php echo htmlentities(strtolower($owner)); ?>
										</a>

										&nbsp; &nbsp;

										<a href="send_message.php?user_id=<?php echo htmlentities($admin->id); ?>" title="send message">&nbsp; <span class="glyphicon glyphicon-envelope"></span> Send Message</a> 
									</td>
								</tr>


								<tr>
									<td><span class="bold">Status: </span></td>
									<td>
										<?php if($ticket->status == 1): ?>
											<span class="em text-success">
												<span class="fa fa-check-circle "></span> Approved
											</span>
										<?php else: ?>
											<span class="em text-danger">
												<span class="fa fa-exclamation-circle"></span> Pending
											</span>
										<?php endif; ?>
									</td>
								</tr>

							</table>

						</div><!-- .table-responsive -->

						<div class="col-sm-4">
							<div class="img-respnsive pull-right">
								
							</div>
						</div>

					</div><!-- .form-group-container -->


					<!-- STATUS -->
					<div class="form-group-container add-admin-container">
					<form action="user_ticket.php?ticket_id=<?php echo $ticket->id; ?>" method="POST">
					<fieldset>
						<legend>Update Status</legend>

						<!-- Delivery Status -->
						<div class="form-group col-sm-6">
							<label for="status">Status: </label>
							<select name="status" id="status" class="form-control">
								<option value=0>Pending</option>
								<option value=1 >Approved</option>
							</select>

						</div><!-- .form-group -->

					</fieldset>
					</div><!-- .form-group-container -->

					
					<!-- Submit Button -->
					<div class="form-group text-right">
						<input type="submit" name="submit" value="Update" class="btn btn-success">
						<a onclick="return confirm('Are you sure you want to delete this ticket?');" href="process_delete_ticket.php?r=user_tickets&ticket_id=<?php echo $ticket->id; ?>" title="Delete Ticket" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete </a>
					</div><!-- .form-group -->

					</form>

					
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
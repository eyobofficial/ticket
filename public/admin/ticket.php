<?php $page_context = "admin"; ?>
<?php $page_title = "ticket"; ?>
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
						<h2 class="h4 text-left actionTitle"> Ticket Info</h1>
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
										<?php if(strtolower($owner) == "admin"): ?>
											<span class="shade"><?php echo ucfirst($owner); ?></span>
										<?php else: ?>
										<a class="shadeLink em" href="user.php?user_id=<?php echo htmlentities(strtolower($user->id)); ?>">
											<?php echo htmlentities(strtolower($owner)); ?>
										</a>
										<?php endif; ?>

										&nbsp; &nbsp;

										<a href="send_message.php?user_id=<?php echo htmlentities($admin->id); ?>" title="send message">&nbsp; <span class="glyphicon glyphicon-envelope"></span> Send Message</a> 
									</td>
								</tr>

							</table>

						</div><!-- .table-responsive -->

						<div class="col-sm-4">
							<div class="img-respnsive pull-right">
								
							</div>
						</div>

					</div><!-- .form-group-container -->

					<div class="text-right">
						<a href="edit_event.php?event_id=<?php echo $event->id; ?>" title="Edit Ticket" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> Edit</a>
						<a href="all_tickets.php" title="Delete Ticket" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Cancel</a>
					</div><!--.text-right -->

					
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
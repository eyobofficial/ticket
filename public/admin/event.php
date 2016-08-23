<?php $page_context = "admin"; ?>
<?php $page_title = "event"; ?>
<?php $page_section = "manage events"; ?>
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
						<h2 class="h4 text-left actionTitle"> Event Info</h1>
					</header>

					<hr>

					<div class="form-group-container add-admin-container clearfix">
					

						<div class="table-responsive ">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">Event Name: </span></td>
									<td><?php echo htmlentities(ucwords($event->name)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Event Type: </span></td>
									<td><?php echo htmlentities(ucwords($event->type())); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Place: </span></td>
									<td><?php echo htmlentities(ucwords($event->city . ", " . $event->country)); ?></td>
								</tr>


								<tr>
									<td><span class="bold">Venue: </span></td>
									<td><?php echo htmlentities(ucwords($event->venue)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Date: </span></td>
									<td><?php echo htmlentities(date("M d, Y H:i",$event->date)); ?></td>
								</tr>

								

							</table>
						</div><!-- .table-responsive -->

						<div class="col-sm-4">
							<div class="img-respnsive pull-right">
								
							</div>
						</div>

					</div>

					<div class="text-right">
						<a href="edit_event.php?event_id=<?php echo $event_id;  ?>" title="Edit Event" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> Edit</a>
						<a href="remove.php?event_id=<?php echo $event->id; ?>"  onclick="return confirm('Are you sure you want to delete this event?');" title="Delete Event" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</a>
					</div><!--.text-right -->

			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
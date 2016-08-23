<?php $page_context = "admin"; ?>
<?php $page_title = "all events"; ?>
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
			<header>
				<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> All Events</h1>
			</header>

			<section>
				<form action="all_events.php" method="POST" id="allEvents" name="all_events">
					<!-- <div class="row">
						<div class="form-inline col-sm-5 col-xs-12">
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
					<table class="table table-bordered table-hover table-condensed mainTable">
						
								
						<thead>
							<tr>
								<!-- <th></th> -->

								<th>Event Name</th>
								<th>Event Type</th>
								<th>Date</th>
								<th>Venue</th>
								<th>City</th>
								<th>Country</th>
								<th>Featured</th>
							</tr>
						</thead>

						<tbody>
						
							<?php while($current_event = $all_events->fetch_object()): ?>
							<?php $event = new Event($current_event->id); ?>
							<tr>
								<!-- <th>
									<input type="checkbox" name="event_id[]" value="<?php echo $event->id; ?>">
								</th> -->

								<td class="titleCol">
									<a href="event.php?event_id=<?php echo $event->id; ?>">
										<?php echo ucwords($event->name); ?>
									</a>
									<p class="actions">
										<a href="edit_event.php?event_id=<?php echo $event->id; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> |
										<a href="remove.php?event_id=<?php echo $event->id; ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this event?');"><span class="glyphicon glyphicon-trash"></span> Trash</a> |
										<a href="../event.php?id=<?php echo $event->id; ?>" target="_blank"><span class="glyphicon glyphicon-view"></span> View</a> 
									</p>
								</td>
								<td><?php echo ucwords($event->type()); ?></td>
								<td><?php echo date("M d, Y", $event->date); ?></td>
								<td><?php echo ucwords($event->venue); ?></td>
								<td><?php echo ucwords($event->city); ?></td>
								<td><?php echo ucwords($event->country); ?></td>
								<td class="text-warning text-center">
									<?php echo $event->featured == true ? '<span class="glyphicon glyphicon-star"></span>' : '<span class="glyphicon glyphicon-star-empty"></span>'; ?>
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
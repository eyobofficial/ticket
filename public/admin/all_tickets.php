<?php $page_context = "admin"; ?>
<?php $page_title = "all tickets"; ?>
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
			<header>
				<h2 class="h4 text-left actionTitle"> All Tickets</h1>
			</header>

			<section class="col-sm-10">
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
					<table class="table table-bordered table-hover table-condensed">
						
								
						<thead>
							<tr>
								<!-- <th></th> -->

								<th>Package Name</th>
								<th>Event</th>
								<th class="text-right">Price <em>(SEK)</em></th>
								<th class="text-center">Actions</th>
							
							</tr>
						</thead>

						<tbody>
						
							<?php while($current_ticket = $all_tickets->fetch_object()): ?>
							<?php $ticket = new Ticket($current_ticket->id); ?>
							<?php $event  = new Event($ticket->event_id); ?>
							<tr>
								<!-- <th>
									<input type="checkbox" name="user_id[]" value="<?php echo $ticket->id; ?>">
								</th> -->

								<td class="titleCol">
									<a href="ticket.php?ticket_id=<?php echo $ticket->id; ?>">
										<?php echo ucwords(htmlentities($ticket->package)); ?>
									</a>
							
								</td>
								<td><?php echo ucwords(htmlentities($event->name)); ?></td>
								<td class="text-right"><?php echo ucwords(htmlentities($ticket->price)); ?></td>
								
								<td class="text-center">
									<a href="ticket.php?ticket_id=<?php echo $ticket->id; ?>" title="view ticket" class="sm shade-link">View </a>  / &nbsp;
									<a href="edit_event.php?event_id=<?php echo (int)$event->id; ?>" title="Edit Ticket" class="sm shade-link"><span class="fa fa-edit"></span> Edit </a>
									
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
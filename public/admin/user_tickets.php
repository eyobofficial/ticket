<?php $page_context = "admin"; ?>
<?php $page_title = "user tickets"; ?>
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
				<h2 class="h4 text-left actionTitle"> All User Tickets</h1>
			</header>

			<section>
				<!-- <form action="user_tickets.php" method="POST" id="allEvents" name="all_events"> -->
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
								<!-- <th>Submitted Date</th> -->
								<th class="text-center">Status</th>
								<th class="text-center">Actions</th>
							
							</tr>
						</thead>

						<tbody>
						
							<?php while($current_ticket = $all_tickets->fetch_object()): ?>
							<?php 
								if(User::is_admin($current_ticket->seller_id)){
									continue;
								}
							?>

							<?php 
								$event  = new Event($current_ticket->event_id); 
								$ticket = new Ticket($current_ticket->id);
							?>
							<tr>
								<!-- <th>
									<input type="checkbox" name="user_id[]" value="<?php //echo $ticket->id; ?>">
								</th> -->

								<td class="titleCol">
									<a href="user_ticket.php?ticket_id=<?php echo $ticket->id; ?>">
										<?php echo ucwords(htmlentities($ticket->package)); ?>
									</a>
							
								</td>
								<td><?php echo ucwords(htmlentities($event->name)); ?></td>
								<td class="text-right"><?php echo ucwords(htmlentities($ticket->price)); ?></td>
								<!-- <td><?php //echo date("M d, Y", $order->stamp); ?></td> -->

								<td class="text-center">
									<?php if($ticket->status == 0): ?>
										<span class="text-danger"><span class="fa fa-exclamation-circle"></span> Pending</span>
									<?php else: ?>
										<span class="text-success"><span class="fa fa-check-circle"></span> Approved</span>
									<?php endif; ?>
								</td>
								
								<td class="text-center">
									<a href="user_ticket.php?ticket_id=<?php echo $ticket->id; ?>" title="View Ticket"><span class="fa fa-eye"></span> View </a> | 
									<a onclick="return confirm('Are you sure you want to delete this ticket?');" href="process_delete_ticket.php?r=user_tickets&ticket_id=<?php echo $ticket->id; ?>" title="Delete Ticket"><span class="glyphicon glyphicon-trash"></span> Delete </a>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
						<!-- </form> -->
					</table>
				</div>
			</section>
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>


<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
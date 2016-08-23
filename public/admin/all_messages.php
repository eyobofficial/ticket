<?php $page_context = "admin"; ?>
<?php $page_title = "all messages"; ?>
<?php $page_section = "manage messages"; ?>
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
				<h2 class="h4 text-left actionTitle"><span class="glyphicon glyphicon-envelope"></span> All Messages</h1>
			</header>
			
			<section>
				<!-- <form action="all_messages.php" method="POST" id="allEvents" name="all_events"> -->
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
					<?php if($recieved->num_rows > 0): ?>
					<table class="table table-bordered table-hover table-condensed">
						
								
						<thead>
							<tr>
								<!-- <th></th> -->
								<th>From</th>
								<th class="text-center">Subject</th>
								<th class="text-center">Sent Date</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>

						<tbody>
						
							<?php while($current_message = $recieved->fetch_object()): ?>

							<?php 
								$message = new Message($current_message->id, true);
								$sender  = new User($message->sender_id); 
							 ?>

							<tr <?php if($message->seen == 0): ?> class="notSeen" <?php endif; ?> >
								<!-- <th>
									<input type="checkbox" name="event_id[]" value="<?php echo $message->id; ?>">
								</th> -->

								<td>
									<a href="user.php?user_id=<?php echo $sender->id; ?>">
										<?php echo ucwords($sender->fullname); ?>
									</a> 
								</td>

								<td class="text-center">
									<a href="message.php?message_id=<?php echo $message->id; ?>" title="Read Message">
										<?php echo ucwords(strtolower($message->subject)); ?>
									</a>
								</td>

								<td class="text-center"><?php echo date("M d, Y", $message->stamp); ?></td>
								
								<td class="text-center">
									<a href="message.php?message_id=<?php echo $message->id; ?>" title="Read Message"> Read</a> / &nbsp;
									<a onclick="return confirm('Are you sure you want to delete this message?');" href="process_delete_message.php?message_id=<?php echo $message->id; ?>" title="Delete Message"><span class="fa fa-trash"></span> Delete</a> / &nbsp;
									<a href="send_message.php?user_id=<?php echo $sender->id; ?>" title="Read Message"><span class="fa fa-reply"></span> Reply</a>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					<!-- 	</form> -->
					</table>

					<?php else: ?>
						<p class="noticeMsg text-center"><span class="fa fa-exclamation-circle"></span>  You have no message. </p>
					<?php endif; ?>
				</div>
			</section>
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>


<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
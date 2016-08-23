<?php $page_title = "messages"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="account.php">User Account</a></li>
			<li class="active"><a href="messages.php">Inbox</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8 text-left">
			All Messages
		</h2>
	</div><!-- .eventHeader -->
	
	<div class="row">
		<!-- LEFT SIDE - ACCOUNT NAVIGATION -->
		<div class="col-sm-3" id="accountSidebar">
			<?php include_once('layout/acountsidebar.layout.php'); ?>
		</div><!-- .col-sm-4 -->




		<!-- RIGHT SIDE -->
		<div class="col-sm-9">
			<!-- Form registration error, if any -->
			<?php if(!empty($errors)): ?>
				<div class="errorMsg">
					<p><span class="glyphicon glyphicon-warning-sign text-danger"></span>  Please fix the following: </p>
					<ul>
						<?php foreach($errors as $error_key => $error): ?>
							<li><?php echo ucfirst($error); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			
			<div class="table-responsive form-group-container add-group-container messages-table-container clearfix">
				<legend><span class="fa fa-envelope"></span> All Messages</legend>
				
				<?php if($recieved->num_rows > 0): // i.e  if there any messages ?>

					<table class="table table-bordered table-hover table-condensed">
					
							
					<thead>
						<tr>
							<th>From</th>
							<th class="text-center">Subject</th>
							<th class="text-center">Date</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
							<?php while($current_message = $recieved->fetch_object()): ?>
							<?php $message = new Message($current_message->id); ?>

							<tr <?php if($message->seen == 0): ?> class="notSeen" <?php endif; ?> >

								<td class="text-center"><span class="shade em">(Admin)</span></td>
								<td class="text-center">
									<a href="message.php?message_id=<?php echo $message->id; ?>" title="Read Message">
										<?php echo ucwords(ucwords($message->subject)); ?>
											<?php if($message->seen == 0): ?>
												<span class="label label-danger sm"> New</span>
											<?php endif; ?>
									</a>
								</td>

								<td class="text-center"><?php echo date("M d, Y", $message->stamp); ?></td>
								
								<td class="small text-center">
									<a href="message.php?message_id=<?php echo $message->id; ?>" title="Read Message"> Read</a> / &nbsp;
									<a onclick="return confirm('Are you sure you want to delete this message?');" href="delete_message.php?message_id=<?php echo $message->id; ?>" title="Read Message"><span class="fa fa-trash"></span> Delete</a> / &nbsp;
									<a href="send_message.php" title="Read Message"><span class="fa fa-reply"></span> Reply</a>
								</td>
							</tr>
							<?php endwhile; ?>
					</tbody>
					</form>
					</table>

				<?php else: // i.e. if there are NO messages ?>
					<p class="text-center"><span class="fa fa-exclamation-circle"></span>  You have no message. </p>
				<?php endif; ?>
			</div>
			
		</div><!-- .col-sm-9 -->

	</div><!-- .row -->

</main>

	


<?php include_once('layout/footer.inc.php'); ?>
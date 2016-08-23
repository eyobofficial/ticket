<?php $page_title = "message"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="account.php">User Account</a></li>
			<li><a href="messages.php">Inbox</a></li>
			<li class="active"><a href="message.php">Message: <?php echo ucwords($message->subject); ?></a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8 text-left">
			Message
		</h2>
	</div><!-- .eventHeader -->
	
	<div class="row">
		<!-- LEFT SIDE - TICKET DETAILS -->
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

			
			<div class="form-group-container add-admin-container messages-table-container clearfix">
				
				<legend>Subject: <span class="shade"><?php echo htmlentities(ucwords($message->subject)); ?></span></legend>

				<div class="table-responsive col-sm-10">
					<table class="table table-condensed borderless">

						<tr>
							<td><span class="bold">From: </span></td>
							<td><span class="shade em">(Admin)</span></td>
						</tr>

						<tr>
							<td><span class="bold">Message: </span></td>
							<td><?php echo empty($message->text) ? '(No Message Text)' : ucfirst($message->text); ?></td>
						</tr>
					</table>
				</div><!-- .table-responsive -->

				<div class="col-sm-4">
					<div class="img-respnsive pull-right">
						
					</div>
				</div>

			</div><!-- .form-group-container -->

			<div class="text-right more-action-container">
				<a onclick="return confirm('Are you sure you want to delete this message?');" href="delete_message.php?message_id=<?php echo $message->id; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</a>
				<a href="send_message.php" class="btn btn-success"><span class="fa fa-reply"></span> Reply</a>
			</div>

			
		</div><!-- .col-sm-9 -->

	</div><!-- .row -->
	

</main>

	


<?php include_once('layout/footer.inc.php'); ?>
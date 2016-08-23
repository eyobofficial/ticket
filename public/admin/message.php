<?php $page_context = "admin"; ?>
<?php $page_title = "message"; ?>
<?php $page_section = "manage message"; ?>
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
				<section class="col-sm-10">

					<header>
						<h2 class="h4 text-left actionTitle"><span class="fa fa-envelope"></span> Message</h1>
					</header>

					<hr>

					<div class="form-group-container add-admin-container clearfix">
					

						<div class="table-responsive">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">Subject: </span></td>
									<td><span class="shade">
										<?php echo htmlentities(ucwords($message->subject)); ?>
									</span></td>
								</tr>

								<tr>
									<td><span class="bold">From: </span></td>
									<td><span class="shade em">
										<?php echo htmlentities(strtolower($message->sender_email)); ?>
									</span></td>
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

					</div>


					<div class="text-right">
						<a href="send_message.php?user_id=<?php echo $sender->id; ?>" title="Reply" class="btn btn-success"> <span class="glyphicon glyphicon-reply"></span> Reply</a>
						<a onclick="return confirm('Are you sure you want to delete this message?');" href="process_delete_message.php?message_id=<?php echo $message->id; ?>" title="Delete Message" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</a>
					</div><!--.text-right -->
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
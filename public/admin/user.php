<?php $page_context = "admin"; ?>
<?php $page_title = "user"; ?>
<?php $page_section = "manage users"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> User Info</h1>
					</header>

					<hr>

					<div class="form-group-container add-admin-container clearfix">
					

						<div class="table-responsive ">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">First Name: </span></td>
									<td><?php echo htmlentities(ucwords($user->first_name)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Last Name: </span></td>
									<td><?php echo htmlentities(ucwords($user->last_name)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Username: </span></td>
									<td><span class="em shade"><?php echo empty($user->username) ? '(No username)' : htmlentities(ucwords($user->username)); ?> </span></td>
								</tr>


								<tr>
									<td><span class="bold">Email: </span></td>
									<td>
										<span class="em"><?php echo htmlentities(strtolower($user->email)); ?></span> 
										<a href="send_message.php?user_id=<?php echo htmlentities($user->id); ?>" title="send message">&nbsp; <span class="glyphicon glyphicon-envelope"></span> Send Message</a> 
									</td>
								</tr>
							</table>
						</div><!-- .table-responsive -->

						<div class="col-sm-4">
							<div class="img-respnsive pull-right">
								
							</div>
						</div>

					</div>

					<div class="text-right">
						<a href="delete_user.php?user_id=<?php echo htmlentities($user->id); ?>" title="Delete User" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</a>
					</div><!--.text-right -->
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
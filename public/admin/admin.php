<?php $page_context = "admin"; ?>
<?php $page_title = "admin"; ?>
<?php $page_section = "manage admins"; ?>
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
						<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> Admin Info</h1>
					</header>

					<hr>

					<div class="form-group-container add-admin-container clearfix">
					

						<div class="table-responsive">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">First Name: </span></td>
									<td><?php echo htmlentities(ucwords($admin->first_name)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Last Name: </span></td>
									<td><?php echo htmlentities(ucwords($admin->last_name)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Username: </span></td>
									<td><span class="em shade"><?php echo empty($admin->username) ? '(No username)' : htmlentities(ucwords($admin->username)); ?> </span></td>
								</tr>


								<tr>
									<td><span class="bold">Email: </span></td>
									<td>
										<span class="em"><?php echo htmlentities(strtolower($admin->email)); ?></span> 
										<a href="send_message.php?user_id=<?php echo htmlentities($admin->id); ?>" title="send message">&nbsp; <span class="glyphicon glyphicon-envelope"></span> Send Message</a> 
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
						<a href="edit_admin.php?admin_id=<?php echo htmlentities($admin->id); ?>" title="Edit Admin Details" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> Edit</a>
						<a onclick="return confirm('Are you sure you want to delete this user?');" href="delete_admin.php?admin_id=<?php echo $admin->id; ?>" title="Delete Admin" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</a>
					</div><!--.text-right -->
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
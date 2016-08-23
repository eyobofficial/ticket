<?php $page_context = "admin"; ?>
<?php $page_title = "all admins"; ?>
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
			<header>
				<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> All Admins</h1>
			</header>

			<hr>

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
					<table class="table table-bordered table-hover table-condensed">
						
								
						<thead>
							<tr>
								<!-- <th></th> -->

								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Actions</th>
							
							</tr>
						</thead>

						<tbody>
						
							<?php while($current_admin = $all_admins->fetch_object()): ?>
							<?php $admin = new User($current_admin->id); ?>
							<tr>
								<!-- <th>
									<input type="checkbox" name="user_id[]" value="<?php echo $admin->id; ?>">
								</th> -->

								<td class="titleCol">
									<a href="admin.php?admin_id=<?php echo $admin->id; ?>">
										<?php echo ucwords($admin->fullname); ?>
									</a>
							
								</td>
								<td><?php echo strtolower($admin->username); ?></td>
								<td><?php echo strtolower($admin->email); ?></td>
								
								<td>
									<a href="admin.php?admin_id=<?php echo $admin->id; ?>" title="View Admin"><span class="fa fa-eye"></span> View </a> | 
									<a onclick="return confirm('Are you sure you want to delete this user?');" href="delete_admin.php?admin_id=<?php echo $admin->id; ?>" title="Delete Admin"><span class="glyphicon glyphicon-trash"></span> Delete </a> |
									<a href="send_message.php?user_id=<?php echo htmlentities($admin->id); ?>" title="Send Message"><span class="glyphicon glyphicon-envelope"></span> Send Message </a>
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
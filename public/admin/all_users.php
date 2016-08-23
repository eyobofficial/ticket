<?php $page_context = "admin"; ?>
<?php $page_title = "all users"; ?>
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
			<header>
				<h2 class="h4 text-left actionTitle"><span class="fa fa-user"></span> All Users</h1>
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
						
							<?php while($current_user = $all_users->fetch_object()): ?>
							<?php $user = new User($current_user->id); ?>
							<tr>
								<!-- <th>
									<input type="checkbox" name="user_id[]" value="<?php echo $user->id; ?>">
								</th> -->

								<td class="titleCol">
									<a href="user.php?user_id=<?php echo $user->id; ?>">
										<?php echo ucwords($user->fullname); ?>
									</a>
							
								</td>
								<td><?php echo strtolower($user->username); ?></td>
								<td><?php echo strtolower($user->email); ?></td>
								
								<td>
									<a href="user.php?user_id=<?php echo htmlentities($user->id); ?>" title="View User"><span class="fa fa-eye"></span> View </a> | 
									<a onclick="return confirm('Are you sure you want to delete this user?');" href="delete_user.php?user_id=<?php echo htmlentities($user->id); ?>" title="Delete User"><span class="glyphicon glyphicon-trash"></span> Delete </a> |
									<a href="send_message.php?user_id=<?php echo htmlentities($user->id); ?>" title="View User"><span class="glyphicon glyphicon-envelope"></span> Send Message </a>
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
<header id="adminHeader">
	<div class="container-fluid">
		<div class="col-sm-3">
			<h1><a href="index.php" title="Admin"><?php echo strtoupper(WEBSITE_NAME); ?></a></h1>
		</div>


		<div class="col-sm-6">
			<p class="topNotifications text-center">
				<a href="add_event.php"><span class="glyphicon glyphicon-plus"></span> Add Event</a> &nbsp; &nbsp;
				<a href="all_users.php"><span class="glyphicon glyphicon-user"></span> Manage Users</a> &nbsp; &nbsp;
				<a href="general_settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a>
			</p>
		</div>

		<div class="col-sm-3 text-right">
			<p class="topNotifications">
				<a href="account.php">Welcome <?php echo ucwords($logged_admin->fullname); ?></a> | 
				<a href=".." target="_blank">Visit Site</a> | 
				<a href="logout.php"> Sign Out</a>
			</p>
			
		</div>
		
	</div>
</header>
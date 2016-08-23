<section id="adminNotification">
	<!-- <h1 class="h3 text-right"><a href="index.php">Nordic Admin</a></h1> -->

	<p class="text-center">You have <a href="all_messages.php">
		<?php if(Message::msg_count(true) == 0): ?>
			no new message
		<?php else: ?>
			<?php echo Message::msg_count(true); ?> messages
		<?php endif; ?>
	</a></p>
</section>


<!-- page navigation -->
<nav class="row">
	<ul class="list-unstyled pull-right">
		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage dashboard" ? 'class="active"' : ""; ?> ><a href="index.php">Dashboard</a></li>

		<!-- EVENT NAVIGATION -->
		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage events"    ? 'class="active"' : ""; ?> ><a href="all_events.php">Events</a>
			<?php if(isset($page_section) && strtolower($page_section) == "manage events"): ?>
			<ul class="secondaryNav">
				<li <?php if(strtolower($page_title == 'all events') || strtolower($page_title == 'event')){echo "class='active' ";} ?> ><a href="all_events.php">All Events</a></li>
				<li <?php if(strtolower($page_title == 'add event')){echo "class='active' ";} ?>><a href="add_event.php">Add New Event</a></li>
			</ul>
			<?php endif; ?>
		</li>


		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage tickets"  ? 'class="active"' : ""; ?> ><a href="all_tickets.php">Tickets</a>
			<?php if(isset($page_section) && strtolower($page_section) == "manage tickets"): ?>
			<ul class="secondaryNav">
				<li <?php if(strtolower($page_title == 'all tickets') || strtolower($page_title == 'ticket')){echo "class='active' ";} ?>><a href="all_tickets.php">All Ticket Packages</a></li>
				<li <?php if(strtolower($page_title == 'user tickets')){echo "class='active' ";} ?>><a href="user_tickets.php">User Tickets</a></li>
			</ul>
			<?php endif; ?>
		</li>		



		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage delivery"  ? 'class="active"' : ""; ?> ><a href="all_delivery.php">Delivery Methods</a>
			<?php if(isset($page_section) && strtolower($page_section) == "manage delivery"): ?>
			<ul class="secondaryNav">
				<li <?php if(strtolower($page_title == 'all delivery') || strtolower($page_title == 'delivery')){echo "class='active' ";} ?>><a href="all_delivery.php">All Delivery Methods</a></li>
				<li <?php if(strtolower($page_title == 'add delivery')){echo "class='active' ";} ?>><a href="add_delivery.php">Add Delivery Method</a></li>
			</ul>
			<?php endif; ?>
		</li>							



		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage users"     ? 'class="active"' : ""; ?> ><a href="all_users.php">Users</a>
			<?php if(isset($page_section) && strtolower($page_section) == "manage users"): ?>
			<!-- <ul class="secondaryNav">
				<li class="active"><a href="all_users.php">All Users</a></li>
				<li><a href="add_user.php">Add New User</a></li>
			</ul> -->
			<?php endif; ?>
		</li>

		<?php if( (int)$logged_admin->privilege === 1): ?>
			<li <?php echo  isset($page_section) && strtolower($page_section) == "manage admins"  ? 'class="active"' : ""; ?> ><a href="all_admins.php">Admins</a>
				<?php if(isset($page_section) && strtolower($page_section) == "manage admins"): ?>
				<ul class="secondaryNav">
					<li <?php if(strtolower($page_title == 'all admins') || strtolower($page_title == 'admin')){echo "class='active' ";} ?>><a href="all_admins.php">All Admins</a></li>
					<li <?php if(strtolower($page_title == 'add admin')){echo "class='active' ";} ?>><a href="add_admin.php">Create New Admin</a></li>
				</ul>
				<?php endif; ?>
			</li>
		<?php endif; ?>

		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage messages"  ? 'class="active"' : ""; ?> ><a href="all_messages.php">Messages</a>
			<?php if(isset($page_section) && strtolower($page_section) == "manage messages"): ?>
			<ul class="secondaryNav">
				<li <?php if(strtolower($page_title == 'all messages') || strtolower($page_title == 'message')){echo "class='active' ";} ?>><a href="all_messages.php">Inbox <?php if(Message::msg_count() > 0){echo "(" . Message::msg_count() . ")";} ?></a></li>

				<?php if( (int)$logged_admin->privilege === 2): ?>
					<li <?php if(strtolower($page_title == 'send message')){echo "class='active' ";} ?>><a href="send_admin.php?user_id=<?php echo $logged_admin->id; ?>" title="Contact The Superadmin"> Contact the Superadmin</a> </li>
				<?php endif; ?>

			</ul>
			<?php endif; ?>
		</li>


		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage orders"  ? 'class="active"' : ""; ?> ><a href="all_orders.php">Orders</a>
			<?php if(isset($page_section) && strtolower($page_section) == "manage orders"): ?>
			<ul class="secondaryNav">
				<li class="active"><a href="all_orders.php">All Orders</a></li>
				
			</ul>
			<?php endif; ?>


		<li <?php echo  isset($page_section) && strtolower($page_section) == "manage settings"  ? 'class="active"' : ""; ?> ><a href="general_settings.php">Settings</a>
			<?php if(isset($page_section) && strtolower($page_section) == "manage settings"): ?>
			<ul class="secondaryNav">
				<li <?php if(strtolower($page_title == 'general settings')){echo "class='active' ";} ?>><a href="general_settings.php">General</a></li>
				<li <?php if(strtolower($page_title == 'account settings')){echo "class='active' ";} ?>><a href="account_settings.php">Account</a></li>
				<li <?php if(strtolower($page_title == 'change password')){echo "class='active' ";} ?>><a href="change_password.php">Change Passowrd</a></li>
				<li <?php if(strtolower($page_title == 'currency rates')){echo "class='active' ";} ?>><a href="currency.php">Conversion Rates</a></li>
				<li <?php if(strtolower($page_title == 'tax')){echo "class='active' ";} ?>><a href="tax.php">Tax</a></li>
				<!-- <li><a href="payment_settings.php">Payment Methods</a></li> -->
			</ul>
			<?php endif; ?>
		</li>						
	</ul>
</nav>
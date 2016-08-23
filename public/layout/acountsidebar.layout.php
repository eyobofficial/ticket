<div class="form-group-container add-admin-container account-detail-container">
	<ul class="list-unstyled">
		<li><a href="account.php"><span class="fa fa-user"></span> Account Details</a></li>

		<li><a href="messages.php"><span class="fa fa-envelope"></span> Inbox 
			<?php if(Message::msg_count() > 0): ?>
				(<?php echo Message::msg_count(); ?>)
			<?php endif; ?>
		</a></li>


		<li><a href="send_message.php"><span class="fa fa-comment"></span> Contact Admin</a></li>
		<li><a href="password.php"><span class="fa fa-lock"></span> Change Password</a></li>
		<li><a href="logout.php"><span class="fa fa-sign-out"></span> Logout</a></li>
	</ul>
</div>
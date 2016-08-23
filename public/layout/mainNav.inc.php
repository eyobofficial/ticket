<!-- Page Navigation -->
<nav id="pageNav" class="navbar navbar-default">
	<a href="index.php" class="navbar-brand"><?php echo ucwords(WEBSITE_NAME); ?></a>
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div><!-- #navbar-header -->


		<div class="navbar-collapse collapse" id="menu">
			<ul class="nav navbar-nav" id="primaryLinks">
				<li <?php echo isset($page_title) && strtolower($page_title) == "concerts" ? "class='active'" : ""; ?>><a href="concerts.php">CONCERTS</a></li>
				<li <?php echo isset($page_title) && strtolower($page_title) == "sports" ? "class='active'" : ""; ?>><a href="sports.php">SPORT EVENTS</a></li>
				<li <?php echo isset($page_title) && strtolower($page_title) == "festivals" ? "class='active'" : ""; ?>><a href="festivals.php">FESTIVALS</a></li>
				<li <?php echo isset($page_title) && strtolower($page_title) == "sell tickets" || strtolower($page_title) == "sell event" ? "class='active'" : ""; ?>><a href="sell.php">SELL TICKETS</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right shortcuts list-inline">
					<!-- <li><a href="cart.php" class="h4" title="shopping cart"><span class="glyphicon glyphicon-shopping-cart"></span>
						<?php //if(isset($logged_user)): ?>
							<span class="badge"><?php //echo Cart::count_cart($logged_user->id); ?>
						<?php// endif; ?>
					</span> <span class="hiddenLabel"> Buy</span></a></li> -->

					<!-- <li><a href="#" class="h4" title="Shopping cart"><span class="glyphicon glyphicon-user"></span>
						<span class="hiddenLabel"> 
							Login
						</span></a>
					</li> -->

					<li class="dropdown">
						<button type="button" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span> <span class="caret"></span>
						</button>

						<?php if(isset($logged_user)): ?>
							<ul class="dropdown-menu">
								<li class="dropdown-header"><?php echo ucwords($logged_user->fullname); ?></li>
								<li role="seprator" class="divider"></li>
								<li><a href="account.php"><span class="fa fa-cog"></span>&nbsp; Account</a></li>
								<li><a href="password.php"><span class="fa fa-lock"></span>&nbsp; Change Password</a></li>


								<li><a href="messages.php"><span class="fa fa-envelope"></span>&nbsp; Messages
									<?php if(Message::msg_count() > 0): ?>
										(<?php echo Message::msg_count(); ?>)
									<?php endif; ?>
								</a></li>


								<li><a href="logout.php"><span class="fa fa-sign-out"></span>&nbsp; Logout</a></li>
							</ul>
						<?php else: ?>
							<ul class="dropdown-menu">
								<li><a href="register.php"><span class="fa fa-user-plus"></span>&nbsp; Register</a></li>
								<li><a href="login.php"><span class="fa fa-sign-in"></span>&nbsp; Login</a></li>
							</ul>
						<?php endif; ?>
					</li>
			</ul>

			
		</div><!-- #menu -->

	</div><!-- .container-fluid -->

	

</nav><!-- #pageNav -->
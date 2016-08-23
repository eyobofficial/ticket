<?php //session_start(); ?>
<?php $page_context = "admin"; ?>
<?php $page_title = "dashboard"; ?>
<?php $page_section = "manage dashboard"; ?>
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
				<h1 class="h3 text-left actionTitle"><span class="fa fa-user"></span> Welcome <?php echo ucwords($logged_admin->fullname); ?></h1>
			</header>

			<hr>

			<div class="row">
				
				<?php include_once('../layout/dashboard.layout.php'); ?>

			</div><!-- .row -->
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>







<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
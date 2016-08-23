<?php $page_title = "search sports"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="sports.php">Sports</a></li>
			<li class="active"><a href="search_sports.php">Search Results</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8">
			Search Results for &quot;<?php echo $keyword; ?>&quot;
		</h2>

		<form action="search_sports.php" method="GET" class="col-sm-4">
			<div class="input-group">
				<input type="search" name="q" class="form-control" placeholder="Search for Sport Events">
				<span class="input-group-btn">
					<input type="submit" value="Go" class="btn btn-warning">
				</span>
			</div><!-- .input-group -->
		</form>
	</div><!-- .eventHeader -->

	<div class="row">
		<div class="col-sm-12">
			<?php include_once("layout/search_errors.layout.php"); ?>
			<div class="row">
				<?php include_once("layout/search.layout.php"); ?>
			</div><!-- .row -->
			
			<!-- Page Pagination -->
			<?php include_once("layout/pagination_layout.inc.php"); ?>
		</div><!-- .col-sm-8 -->
	</div><!-- .row -->
	
	
</main>


<?php include_once('layout/footer.inc.php'); ?>
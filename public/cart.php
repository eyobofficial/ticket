<?php //session_start(); ?>
<?php $page_title = "shopping cart"; ?>
<?php require_once('../includes/intialize.inc.php'); ?>
<?php include_once('layout/head.inc.php'); ?>
<?php include_once('layout/mainNav.inc.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active"><a href="cart.php">Shopping Cart</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle">
			Your Cart
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row mainContainer">
		
		<!-- Payment Method - Right Part -->
		<div class="col-sm-8 col-sm-offset-2" id="cartSummary">
			<?php if($cart_count == 0): ?>
				<p class="noticeMsg text-center"><span class="fa fa-exclamation-circle"></span>  You cart is empty. Start shopping <a href="events.php" title="All Events">here.</a> </p>
			<?php else: ?>

				<div class="table-reponsive">
					<table class="table table-condensed table-stripped cartTable">
						<thead>
							<tr>
								<th>QTY</th>
								<th>Event</th>
								<th>Ticket</th>
								<th class="text-right">Price</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php include_once('cart.layout.php'); ?>
						</tbody>

						<tfoot>
							<tr>
								<td colspan="3" class="text-right">TOTAL</td>
								<td class="text-right"></td>
							</tr>
						</tfoot>
					</table>

					<button type="button" class="btn btn-success btn-block">Checkout</button>
				</div><!-- .table-responsive -->
			

			<?php endif; ?>
			
		</div><!-- .col-sm-8 -->

	</div><!-- .row -->
	
</main>

<?php include_once('layout/footer.inc.php'); ?>

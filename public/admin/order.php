<?php $page_context = "admin"; ?>
<?php $page_title = "order"; ?>
<?php $page_section = "manage orders"; ?>
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
						<h2 class="h4 text-left actionTitle"> Order Summary</h1>
					</header>

					
					<div class="form-group-container add-admin-container clearfix">
						<legend>Ticket Summary</legend>
					
						<div class="table-responsive col-sm-8">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">Orderd Ticket: </span></td>
									<td><?php echo htmlentities(ucwords($ticket->package)); ?></td>
								</tr>

								<tr>
									<td><span class="bold">Event: </span></td>
									<td><?php echo htmlentities(ucwords($event->name)); ?></td>
								</tr>


								<tr>
									<td><span class="bold">Ordered Date: </span></td>
									<td><?php echo date("M d, Y", $order->stamp); ?></td>
								</tr>

							</table>

						</div><!-- .table-responsive -->

						<div class="col-sm-4">
							<div class="img-respnsive pull-right">
								
							</div>
						</div>

					</div><!-- .form-group-container -->


					<!-- BUYER SUMMARY -->
					<div class="form-group-container add-admin-container clearfix">
						<legend>Buyer Summary</legend>
						<div class="table-responsive col-sm-8">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">User Type: </span></td>
									<td>
										<?php if($order->buyer_id > 0): ?>
											<a href="user.php?user_id=<?php echo $order->buyer_id; ?>" title="registered user">Registered</a>
										<?php else: ?>
											<span class="shade em">(Guest User)</span>
										<?php endif; ?>
									</td>
								</tr>


								<tr>
									<td><span class="bold">Name: </span></td>

									<!-- For Registered User get name from user database table -->
									<?php if($order->buyer_id > 0): ?>
										<?php $user = new User($order->buyer_id); ?>
										<td><?php echo ucwords($user->fullname); ?></td>

									<!-- For Guest user, get name from order database table -->
									<?php else: ?>
										<td><?php echo ucwords($order->first_name) . " " . ucwords($order->last_name); ?></td>
									<?php endif; ?>
								</tr>


								<tr>
									<td><span class="bold">Email: </span></td>
									<td><?php echo $order->buyer_email; ?></td>
								</tr>
							</table>

						</div><!-- .table-responsive -->

						<div class="col-sm-4">
							<div class="img-respnsive pull-right">
								
							</div>
						</div>

					</div><!-- .form-group-container -->
					

					<!-- PAYMENT SUMMARY -->
					<div class="form-group-container add-admin-container clearfix">
						<legend>Payment Summary</legend>
						<p class="shade">* All currencies are in <em>SEK</em></p>
						<div class="table-responsive col-sm-8">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">Price per Ticket: </span></td>
									<td><?php echo $ticket->price; ?> </td>
								</tr>


								<tr>
									<td><span class="bold">Number of Tickets: </span></td>
									<td><?php echo $order->number_of_tickets; ?></td>
								</tr>

								<tr>
									<td><span class="bold">Subtotal: </span></td>
									<td><?php echo $order->subtotal; ?></td>
								</tr>


								<tr>
									<td><span class="bold">Delivery Price: </span></td>
									<td><?php echo $order->delivery_amount; ?></td>
								</tr>


								<tr>
									<td><span class="bold">VAT(<?php echo (VAT * 100); ?> %): </span></td>
									<td><?php echo $order->vat; ?></td>
								</tr>


								<tr>
									<td><span class="bold">TOTAL: </span></td>
									<td><?php echo $order->total; ?></td>
								</tr>

							</table>

						</div><!-- .table-responsive -->

					</div><!-- .form-group-container -->


					<!-- DELIVERY SUMMARY -->
					<div class="form-group-container add-admin-container clearfix">
						<legend>Delivery Address</legend>
						<div class="table-responsive col-sm-8">
							<table class="table table-condensed borderless">
								<tr>
									<td><span class="bold">Delivery Method: </span></td>
									<td><?php echo ucwords(Delivery::get_name($order->delivery_method_id)); ?></td>
								</tr>


								<tr>
									<td><span class="bold">Delivery Address: </span></td>
									<td class="em">
										<ul class="list-unstyled">
											<li><?php echo ucwords($order->address1); ?></li>
											<?php if(!empty($order->address2)): ?>
												<li><?php echo ucwords($order->address2); ?></li>
											<?php endif; ?>

											<li><?php echo ucwords($order->city); ?>, <?php echo strtoupper($order->state); ?></li>
											<li><?php echo $order->zip; ?></li>
											<li><?php echo strtoupper(Country::name_from_id($order->country_id)); ?></li>
										</ul>
									</td>
								</tr>


								<tr>
									<td><span class="bold">Delivery Status: </span></td>
									<td> 
										<?php if($order->delivery_status == 0): ?>
											<span class="em text-danger">
												<span class="fa fa-exclamation-circle "></span> Pending
											</span>
										<?php else: ?>
											<span class="em text-success">
												<span class="fa fa-check-circle "></span> Delivered
											</span>
										<?php endif; ?>
									</span></td>
								</tr>

							</table>

						</div><!-- .table-responsive -->


					</div><!-- .form-group-container -->

					
					<!-- DELIVERY STATUS -->
					<div class="form-group-container add-admin-container">
					<form action="order.php?order_id=<?php echo $order->id; ?>" method="POST">
					<fieldset>
						<legend>Update Delivery Status</legend>

						<!-- Delivery Status -->
						<div class="form-group col-sm-6">
							<label for="deliveryStatus">Status: </label>
							<select name="delivery_status" id="deliveryStatus" class="form-control">
								<option value=0>Pending</option>
								<option value=1 >Delivered</option>
							</select>

						</div><!-- .form-group -->

					</fieldset>
					</div><!-- .form-group-container -->

					
					<!-- Submit Button -->
					<div class="form-group text-right">
						<input type="submit" name="submit" value="Update" class="btn btn-success">
					</div><!-- .form-group -->

					</form>

					
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>
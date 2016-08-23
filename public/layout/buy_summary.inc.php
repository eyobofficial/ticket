<div class="checkoutSummaryTitle">
	<h1 class="h3"><?php echo ucwords($event->name); ?></h1>
</div><!-- .checkoutSummaryTitle -->

<div class="checkoutSummaryTime">
	<h4><?php echo date("D M d, Y H:i", $event->date); ?></h4>
	<h5><span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($event->venue); ?>, <?php echo strtoupper($event->city); ?> <?php echo strtoupper($event->country); ?></h5>
</div><!-- .checkoutSummaryTime -->

<div class="checkoutSummaryTicket">
	<ul class="list-unstyled">
		<li><b>Ticket Type</b>  <span class="pull-right"><?php echo ucwords($ticket->package); ?></span></li>
		<li><b>Price Per Ticket</b>  <span class="pull-right"><?php echo $currency->convert($ticket->price); ?> <em><?php echo $currency->code ?></em></span></li>
		<li><b>Number of Tickets (<a href="#">Edit</a>)</b>  <span class="pull-right">x <?php echo $quantity; ?></span></li>
		<li class="subtotal"><b>SUBTOTAL</b>  <span class="pull-right"><b><?php echo $currency->code; ?> <?php echo $currency->convert($sub_total); ?></b></span></li>

		<?php if(isset($delivery_method_id)): ?>
			<li>
				<b>Delivery Price</b>
				<span class="small">(<?php echo Delivery::get_method($delivery_method_id)->name; ?>)</span>
				<span class="pull-right"><?php echo $currency->code; ?> <?php echo $currency->convert($delivery_amount); ?></span>
			</li>


			<li>
				<b>VAT</b>
				<span class="small">(<?php echo (VAT*100); ?>&#37;)</span>
				<span class="pull-right"><?php $currency->code; ?> <?php echo $currency->convert($vat); ?></span>
			</li>
		<?php endif; ?>

		<li class="subtotal"><b>TOTAL</b>  <span class="pull-right"><b><?php $currency->code; ?> <?php echo $currency->convert($total); ?></b></span></li>
	</ul>
	<p></p>
</div><!-- .checkoutSummaryTicket -->

<?php while($row = $cart->fetch_object()): ?>
<?php
	$ticket = new Ticket($row->ticket_id);
	$event  = new Event($ticket->event_id);

?>
	<tr>
		<td><?php echo $row->quantity; ?></td>
		<td><?php echo $event->name; ?></td>
		<td><?php echo $ticket->package; ?></td>
		<td class="text-right"><?php echo $ticket->price; ?></td>
		<td class="actionRow text-left"> <a href="remove_cart.php?cart_id=<?php echo $row->id; ?>" title="Remove from cart"><span class="glyphicon glyphicon-minus-sign text-danger"></span></a> </td>
	</tr>


<?php endwhile; ?>
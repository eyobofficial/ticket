<?php
	if(!isset($_GET['order_id'])){
		header("Location: all_orders.php");
		exit;
	}


	$order_id = $_GET['order_id'];

	$order  = new Order($order_id);
	$ticket = new Ticket($order->ticket_id);
	$event 	= new Event($order->event_id);


	if(isset($_POST['submit'])){
		$delivery_status = $_POST['delivery_status'];

		if($delivery_status == 0){
			$status = false;
		}else{
			$status = true;
		}


		if($order->delivered($order_id, $status)){
			header("Location: all_orders.php");
			exit;
		}else{
			header("Location: order.php?order_id=<?php echo $order_id; ?>");
			exit;
		}
	}
<?php
	if(!isset($_GET['order_id'])){
		header("Location: all_orders.php");
		exit;
	}


	$order_id = (int)$_GET['order_id'];

	if(Order::delete($order_id)){
		header("Location: all_orders.php?s=success");
		exit;
	}else{
		header("Location: all_orders.php?s=failed");
		exit;
	}
<?php
	if(!isset($_GET['delivery_id'])){
		header("Location: all_delivery.php");
		exit;
	}


	$delivery_id = $_GET['delivery_id'];

	$delivery = Delivery::get_method($delivery_id);
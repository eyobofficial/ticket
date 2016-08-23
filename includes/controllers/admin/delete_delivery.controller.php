<?php
	if(!isset($_GET['delivery_id']) || !is_int((int)$_GET['delivery_id'])){
		header("Location: all_delivery.php");
		exit;
	}else{
		$delivery_id = (int)$_GET['delivery_id'];

		if(Delivery::delete($delivery_id)){
			header("Location: all_delivery.php?d=success");
			exit;
		}else{
			header("Location: all_delivery.php?d=failed");
			exit;
		}
	}
<?php
	if(!isset($logged_user)){
		header("Location: login.php");
		exit;
	}


	if(!isset($_GET['cart_id']) || !is_int((int)$_GET['cart_id'])){
		header("Location: cart.php?status=wrong");
		exit;
	}


	$cart_id = (int)$_GET['cart_id'];

	if(Cart::remove_item($cart_id)){
		header("Location: cart.php?status=success");
		exit;
	}else{
		header("Location: cart.php?status=failed");
		exit;
	}
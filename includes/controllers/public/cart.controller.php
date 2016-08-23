<?php
	if(!isset($logged_user)){
		$redirect_url = "cart.php";

		header("Location: login.php?r=cart.php");
		exit;
	}

	$user_id = $logged_user->id;

	$cart_object = new Cart;
	$cart = $cart_object->get_cart($user_id);
	$cart_count = Cart::count_cart($user_id);

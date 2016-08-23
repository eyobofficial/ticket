<?php
	if(!isset($_GET['delivery_id']) || !is_int((int)$_GET['delivery_id'])){
		header("Location: all_delivery.php?s=1");
		exit;
	}else{
		$delivery_id  = (int)($_GET['delivery_id']);
		$errors = array();

		$delivery = Delivery::get_method($delivery_id);

		$method_name = $delivery->name;
		$price       = $delivery->price_per_ticket;

	}



	if(isset($_POST['submit'])){

		$method_name = (string)$_POST['method_name'];
		$price       = (float)$_POST['price'];


		// Validation
		if(!isset($_POST['method_name']) || empty($_POST['method_name'])){
			$errors['name_presence'] = "Please enter the delivery method name";
		}

		if(!isset($_POST['price'])){
			$errors['price_presence'] = "Please enter the delivery price per ticket";
		}

		if(empty($_POST['price']) && (int)($_POST['price']) !== 0){
			$errors['price_invalid'] = "Please enter a valid delivery price per ticket";
		}


		if(!is_numeric($_POST['price'])){
			$errors['price_type'] = "Price per ticket field must be a number";
		}




		// If no error
		if(empty($errors)){

			if(Delivery::edit($delivery_id, $method_name, $price)){
				header("Location: all_delivery.php?s=2");
				exit;
			}else{
				$errors['database'] = "You did not make any changes. Please enter new values to edit delivery method.";
			}
		}



	}
<?php
	if(isset($_POST['submit'])){

		$method_name = (string)$_POST['method_name'];
		$price       = (float)$_POST['price'];

		$errors = array();

		// Validation
		if(!isset($_POST['method_name']) || empty($_POST['method_name'])){
			$errors['name_presence'] = "Please enter the delivery method name";
		}

		if(!isset($_POST['price']) || empty($_POST['price'])){
			$errors['price_presence'] = "Please enter the delivery price per ticket";
		}

		if(!is_numeric($_POST['price'])){
			$errors['presence'] = "Please enter a valid delivery price";
		}




		// If no error
		if(empty($errors)){

			if(Delivery::add($method_name, $price)){
				header("Location: all_delivery.php");
				exit;
			}else{
				$errors = "There is some problem on the database. Please try again.";
			}
		}



	}else{

		// Default values - if form is not submitted 
		$method_name = "";
		$price = "";
	}
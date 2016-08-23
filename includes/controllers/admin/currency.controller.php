<?php
	if(isset($_POST['submit'])){
		$errors = array();


		$rates = $_POST['rate'];

		foreach($rates as $code=>$rate){
			if(empty($rate)){
				$errors[] = "Please enter the rate for <em>{$code}</em>";
			}else{
				if(! Currency::update_rate($code, $rate)){
					$errors[] = "Failed to update currency rate. Please try again.";
				}
			}
		}


		if(empty($errors)){
			header("Location: index.php");
			exit;
		}



	}else{
		$currency_object = new Currency;
		$all_currency = $currency_object->get_all();

	}
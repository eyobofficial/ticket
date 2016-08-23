<?php 
	/**
	 * Mangage Currency default
	 */
	if(isset($_SESSION['currency_id'])){

		$currency_id = (int)$_SESSION['currency_id'];

		if($currency_id <= 3 && $currency_id > 1){
			$currency = new Currency($currency_id);
		}else{
			$currency = new Currency(1);
		}

		

	}else{
		$_SESSION['currency_id'] = 1;
		$currency = new Currency(1);
	}


	

<?php
	if(isset($_POST['submit'])){
		$errors = array();


		$rates = $_POST['rate'];

		foreach($rates as $id=>$rate){
			if(empty($rate)){
				$errors[] = "Please enter all rates";
			}else{
				if(! Tax::update_rate($id, $rate)){
					$errors[] = "Failed to update currency rate. Please try again.";
				}
			}
		}


		if(empty($errors)){
			header("Location: index.php");
			exit;
		}



	}else{
		$taxes = new Tax;
		$all_tax = $taxes->get_all();

	}
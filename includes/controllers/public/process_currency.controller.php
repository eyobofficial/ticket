<?php
	if(isset($_POST['submit'])){
		$currency_id = (int)$_POST['currency_id'];

		$_SESSION['currency_id']  = $currency_id;

		header("Location: index.php");
		exit;

	}else{
		if(isset($_SESSION['currency_id'])){
			header("Location: index.php");
			exit;
		}else{
			$_SESSION['currency_id'] = 1;

			header("Location: index.php");
			exit;
		}
		
	}
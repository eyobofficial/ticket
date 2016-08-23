<?php
	// Output an HTML message
	function message($msg = ""){
		$output = "";

		if(!empty($msg) || $msg !== "0"){
			$output .= "<p class='message'>";
			$output .= $msg;
			$output .= "</p>";
		}

		return $output;
	}

	/**
	 * A function that checks for query success
	 */
	function confirm($result, $sql = ""){
		global $db;

		if(!$result){
			if(!empty($sql)){
				echo $sql . "<br>";
			}

			die("Database query error " . $db->error);
		}
	}

	// Returns cart items count
	function cart_count(){
		if(isset($_SESSION['logged_user_id'])){
			return Cart::count_cart();
		}elseif(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
					$cart_items = $_SESSION['cart'];
					$cart_items_count = 0;

					foreach($cart_items as $cart_item){
						if(!empty($cart_item)){
							foreach($cart_item as $item_key => $item_value){
								if($item_key === 'quantity'){
									$cart_items_count += $item_value;
								}// End of inner foreach
							}// End of If
						}// End of outer foreach
					}

			return $cart_items_count;
		}else{
			return 0;
		}
	}


	/**
	 * Autoload magic function - loads classes automatically
	 */
	function __autoload($class_name){
		if(! require_once('class.' . $class_name . '.inc')){

			die("{$class_name} class could not be loaded. Please check if it is in the correct directory");
		}
		
	}

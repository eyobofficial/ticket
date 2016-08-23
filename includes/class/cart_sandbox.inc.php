<?php
	require_once 'database.php';
	require_once 'generic.inc.php';
	require_once 'ticket.inc.php';


	/**
	 * Shopping Cart Class
	 */
	class Cart extends Generic{
		public $id;
		public $user_id;
		public $ticket_id;
		public $quantity;
		public $stamp;
		public $cart_array = array();
		public $table = "cart";


		/**
		 * Method returns cart from database
		 */
		public function get_db_cart(){
			global $db;

			// Note: $user_id must be checked form db table to check if it exists
			if(isset($_SESSION['logged_user_id'])){
				$user_id = $_SESSION['logged_user_id'];

				$sql  = "SELECT * FROM " . $this->table;
				$sql .= " WHERE user_id = {$user_id}";

				$result = $db->query($sql);

				while($item = $result->fetch_object()){
					$this->cart_array[$item->ticket_id] = array("ticket_id" => $item->ticket_id, "quantity" => $item->quantity);
				}

				return $this->cart_array;
			}else{
				return null;
			}
		}// End get_db_cart() method


		/**
		 *  Method get cart items from both database and cookie
		 */
		public function get_cart(){
			global $db;

			// If user not logged in, from cookie
			if(isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])){
				$cart_items = $_COOKIE['cart'];


			}
		}

	}
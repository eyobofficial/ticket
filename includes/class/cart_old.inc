<?php
	require_once 'database.php';
	require_once 'generic.inc.php';
	require_once 'ticket.inc.php';


	class Cart extends Generic{
		public $id;
		public $user_id;
		public $ticket_id;
		protected $ticket_name;
		public $quantity;
		public $time;
		public $table = "cart";

		/**
		 * Method returns all cart items
		 */
		public function get_cart(){
			global $db;

			$user_id = isset($_SESSION['logged_user_id']) ? (int)($_SESSION['logged_user_id']) : 0;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE user_id = {$user_id} ";

			$result = $db->query($sql);

			if(!$result){
				echo $sql . "<br>";
				die("DATABASE QUERY ERROR");
			}

			return $result;
		}


		public static function add_to_cart($ticket_id, $quantity){
			global $db;

			// Logged user id
			$user_id = isset($_SESSION['logged_user_id']) ? (int)($_SESSION['logged_user_id']) : 0;

			// Check if ticket_id already exists in the database
			$check_sql  = "SELECT id FROM cart ";
			$check_sql .= " WHERE ticket_id = {$ticket_id} ";
			$check_sql .= " AND user_id = {$user_id} ";

			$check = $db->query($check_sql);

			if($check->num_rows > 0){ // i.e. if record already exists
				$old_record_result = $db->query("SELECT quantity FROM cart WHERE ticket_id = {$ticket_id} AND user_id = {$user_id}");

				$old_record = $old_record_result->fetch_object();
				$old_quantity = $old_record->quantity;

				$new_quantity = $old_quantity + $quantity;

				$sql_update  = "UPDATE cart SET quantity = {$new_quantity} ";
				$sql_update .= " WHERE ticket_id = {$ticket_id} AND user_id = {$user_id} ";
				$sql_update .= " LIMIT 1 ";

				$update_result = $db->query($sql_update);

				if(!$update_result){
					echo $sql . "<br>";
					die("DATABASE QUERY ERROR. FAILED TO UPDATE TO DATABASE");
				}else{
					return true;
				}
			}else{
				// If record doesnt exist, add new record
				$sql  = "INSERT INTO cart ";
				$sql .= " (user_id, ticket_id, quantity) ";
				$sql .= " VALUES($user_id, $ticket_id, $quantity) ";

				$result = $db->query($sql);

				if(!$result){
					echo $sql . "<br>";
					die("DATABASE QUERY ERROR. FAILED TO ADD TO DATABASE");
				}else{
					return true;
				}
			}	
		}

		/**
		 * Method counts database cart records
		 */
		public static function count_cart(){
			global $db;

		
			$user_id = isset($_SESSION['logged_user_id']) ? (int)($_SESSION['logged_user_id']) : 0; // Logged user id
			$count = 0;  // Intialize for counting total quantity

			$sql = "SELECT quantity FROM cart WHERE user_id = {$user_id} ";
			$result = $db->query($sql);

			while($obj = $result->fetch_object()){
				$count += $obj->quantity;
			}

			return $count;
		}

		/**
		 * Method empty the cart
		 */
		public static function empty_cart(){
			global $db;

			$sql = "DELETE FROM cart";

			$result = $db->query($sql);

			if(!$result){
				echo $sql . "<br>";
				die("DATABASE QUERY ERROR. FAILED TO DELETE ITEMS");
			}else{
				return true;
			}
		}

		public function get_cart_record($user_id = 1){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE user_id = '{$user_id}'";
			$result = $db->query($sql);

			return $result;
		}

		
	}
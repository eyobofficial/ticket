<?php
	require_once("database.php");

	/**
	 * Ticket class definition
	 */
	class Ticket extends Generic{
		public $id;
		public $event_id;
		public $seller_id;
		public $package;
		public $price;
		public $currency_id;
		public $currency;
		public $available;
		private $sold_count;
		public $status;
		public $table = "tickets";
		
		/**
		 * Method returns all the ticket packages
		 * Alias for the parent get_records() method
		 */
		public function get_tickets(){
			global $db;

			return $this->get_records();
		}


		/**
		 * Method returns all the ticket packages
		 * Alias for the parent get_records() method
		 */
		public function get_ticket($ticket_id = 0){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE id = {$ticket_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			//$result = $this->get_record($ticket_id);
			if($obj = $result->fetch_object()){
				// Assign to respective attributes of object
				$this->id 		   = $obj->id;
				$this->event_id    = $obj->event_id;
				$this->seller_id   = $obj->seller_id;
				$this->package     = $obj->package;
				$this->price       = $obj->price;
				$this->currency_id = $obj->currency_id;
				$this->currency    = $this->currency($obj->currency_id);
				$this->sold_count  = $obj->sold_count;
				$this->available   = $obj->total_ticket_number;
				$this->status      = $obj->status;

				return true;
			}
		}

		/**
		 * Method returns all ticket packages by event_id
		 */
		public function get_by_event_id($event_id){
			global $db;

			$sql  = "SELECT * FROM tickets ";
			$sql .= " WHERE event_id = {$event_id} ";

			return $this->match_sql($sql);
		}



		/**
		 * Get currency from currency_id
		 */
		public function currency($currency_id){
			global $db;

			$sql = "SELECT * FROM currency WHERE id = {$currency_id} LIMIT 1 ";

			$result = $db->query($sql);
			$obj    = $result->fetch_object();

			if($obj){
				return $obj->code;
			}else{
				die("Query error: Failed to get currency type");
			}

		}

		/**
		 * Method create new ticket package
		 */
		public function add($event_id, $seller_id, $package_title, $price, $currency_id, $ticket_count, $status = true){
			global $db;

			$event_id = (int)($event_id);
			$seller_id = (int)($seller_id);

			$package_title = (string)(trim($package_title));
			$package_title = $db->real_escape_string($package_title);

			$price = (float)(trim($price));
			$currency_id = 1;
			$ticket_count = (int)(trim($ticket_count));


			$ticket_status = $status ? 1 : 0;


			$sql  = "INSERT INTO " . $this->table;
			$sql .= " (event_id, seller_id, package, price, currency_id, total_ticket_number, status) ";
			$sql .= "VALUES({$event_id}, {$seller_id}, '{$package_title}', {$price}, {$currency_id}, {$ticket_count}, {$ticket_status}) ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		/**
		 * Method update ticket package
		 */
		public function update($ticket_id, $seller_id, $package_title, $price, $currency_id, $ticket_count){
			global $db;

			$ticket_id = (int)($ticket_id);
			//$event_id  = (int)($event_id);
			$seller_id = (int)($seller_id);

			$package_title = (string)(trim($package_title));
			$package_title = $db->real_escape_string($package_title);

			$price = (float)(trim($price));
			$currency_id = (int)($currency_id);
			$ticket_count = (int)(trim($ticket_count));


			$sql  = " UPDATE tickets ";
			$sql .= " SET seller_id = {$seller_id}, ";
			$sql .= " package = '{$package_title}', ";
			$sql .= " price   = {$price}, ";
			$sql .= " currency_id   = {$currency_id}, ";
			$sql .= " total_ticket_number   = {$ticket_count} ";
			$sql .= " WHERE id = {$ticket_id} ";
			$sql .= " LIMIT 1 ";


			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		/**
		 * Update ticket status
		 */
		public function update_status($ticket_id, $status = true){
			global $db;

			$ticket_status = $status ? 1 : 0;

			$sql  = " UPDATE tickets ";
			$sql .= " SET status = {$ticket_status} ";
			$sql .= " WHERE id = {$ticket_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}


		/**
		 * Update ticket status to 'Approved'
		 */
		public function approve($ticket_id){
			global $db;


			$sql  = " UPDATE tickets ";
			$sql .= " SET status = 1 ";
			$sql .= " WHERE id = {$ticket_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		/**
		 * Update ticket status to 'pend'
		 */
		public function pend($ticket_id){
			global $db;


			$sql  = " UPDATE tickets ";
			$sql .= " SET status = 0 ";
			$sql .= " WHERE id = {$ticket_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		/**
		 * Delete a ticket package by event_id
		 */
		public function delete($event_id){
			global $db;

			// Check if atleast one ticket package exists
			if($this->check_by_event_id($event_id)){
				$sql  = "DELETE FROM " . $this->table;
				$sql .= " WHERE event_id = {$event_id} ";

				$result = $db->query($sql);


				if($result && $db->affected_rows > 0){
					return true;
				}else{
					echo $sql . "<br>";
					die("Failed to delete ticket packages");
				}
			}
		} // End delete()



		/**
		 * Delete a ticket package by ticket_id
		 */
		public function remove($ticket_id){
			global $db;

			$sql = " DELETE FROM tickets WHERE id = {$ticket_id} LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;

			
		} // End remove method



		public function get_event_id($ticket_id){
			global $db;

			$result = $this->get_ticket($ticket_id);
			
			return $this->event_id;
		}




		/**
		 * Check if record exits by event_id
		 */
		public function check_by_event_id($event_id){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE event_id = {$event_id} ";

			$result = $db->query($sql);

			if(!$result || $result->num_rows == 0){
				return false;
			}else{
				return true;
			}
		}

		/**
		 * Method checks if record exits in a table
		 */
		public static function check_by_id($ticket_id = 0){
			global $db;

			$sql  = "SELECT * FROM tickets ";
			$sql .= " WHERE id = {$ticket_id} ";

			$result = $db->query($sql);

			if(!$result || $result->num_rows == 0){
				return false;
			}else{
				return true;
			}
		}


		/**
		 * Delete ticket by event_id 
		 */
		public static function remove_by_event_id($event_id){
			global $db;

			$sql  = "DELETE FROM tickets ";
			$sql .= " WHERE event_id = {$event_id} ";

			$result = $db->query($sql);

			if(confirm($result, $sql) && $db->affected_rows > 0){
				return true;
			}else{
				return false;
			}
		}


		/**
		 * Constructor magic method
		 */
		public function __construct($id = 0){
			if($id == 0){
				$this->get_tickets();
			}elseif($id !== 0){
				$this->get_ticket($id);
			}
		}
	}
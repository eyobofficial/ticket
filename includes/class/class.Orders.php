<?php
	require_once('database.php');
	
	class Order {
		public $id;
		public $ticket_id;
		public $event_id;
		public $buyer_id;
		public $buyer_email;
		public $number_of_tickets;
		public $currency_id = 1;
		public $subtotal;
		public $delivery_amount;
		public $vat;
		public $total;
		public $first_name;
		public $last_name;
		public $delivery_method_id;
		public $delivery_status;
		public $address1;
		public $address2;
		public $city;
		public $state;
		public $zip;
		public $country;
		public $stamp; 		// Unix timestamp
		public $table = "orders";


		public function __construct($id = null){
			global $db;

			if(is_null($id)){
				return $this->get_orders();
			}else{
				return $this->get_order($id);
			}
		}



		public static function add($ticket_id, 
								   $buyer_id, 
								   $buyer_email,  
								   $number_of_tickets, 
								   $subtotal, 
								   $delivery_amount, $vat, $total, 
								   $first_name, $last_name, 
								   $address1, $address2,
								   $city,
								   $state,
								   $zip,
								   $country_id,
								   $delivery_method_id,
								   $delivery_status = 0,
								   $currency_id = 1){
			global $db;

			$ticket = new Ticket($ticket_id);
			$event_id = $ticket->event_id;

			$sql  = " INSERT INTO orders (";
			$sql .= " ticket_id, event_id, buyer_id, buyer_email, ";
			$sql .= " number_of_tickets, subtotal, delivery_amount, vat, total, ";
			$sql .= " first_name, last_name, ";
			$sql .= " address1, address2, city, state, zip, country_id, ";
			$sql .= " delivery_method_id, delivery_status, currency_id )";
			
			$sql .= " VALUES( ";
			$sql .= "  {$ticket_id}, {$event_id} , {$buyer_id}, '{$buyer_email}', ";
			$sql .= "  {$number_of_tickets}, {$subtotal} , {$delivery_amount},  {$vat}, {$total}, ";
			$sql .= "  '{$first_name}', '{$last_name}', ";
			$sql .= "  '{$address1}', '{$address2}', '{$city}', '{$state}', '{$zip}', {$country_id}, ";
			$sql .= "  {$delivery_method_id}, {$delivery_status}, {$currency_id} ";
			$sql .= " ) ";


			$result = $db->query($sql);

			confirm($result, $sql);

			return true;
		}


		public function get_orders(){
			global $db;

			$sql  = " SELECT * FROM orders ";
			$sql .= " ORDER BY transaction_time DESC ";

			$result = $db->query($sql);

			confirm($result);

			return $result;
		}


		public function get_order($order_id = 0){
			global $db;

			$sql  = " SELECT * FROM orders ";
			$sql .= " WHERE id = {$order_id} ";
			$sql .= " LIMIT 1 ";

			$result_set = $db->query($sql);
			confirm($result_set);

			if($result = $result_set->fetch_object()){
				$this->id = $result->id;
				$this->ticket_id = $result->ticket_id;
				$this->event_id = $result->event_id;
				$this->buyer_id = $result->buyer_id;
				$this->buyer_email = $result->buyer_email;
				$this->number_of_tickets = $result->number_of_tickets;
				$this->currency_id = $result->currency_id;
				$this->subtotal = $result->subtotal;
				$this->delivery_amount = $result->delivery_amount;
				$this->vat = $result->vat;
				$this->total = $result->total;
				$this->first_name = $result->first_name;
				$this->last_name = $result->last_name;
				$this->delivery_method_id = $result->delivery_method_id;
				$this->delivery_status = $result->delivery_status;
				$this->address1 = $result->address1;
				$this->address2 = $result->address2;
				$this->city = $result->city;
				$this->state = $result->state;
				$this->zip = $result->zip;
				$this->country_id = $result->country_id;
				$this->stamp = strtotime($result->transaction_time);
			}

			

			return true;
		}



		public function get_by_ticket_id($ticket_id){
			global $db;

			$sql  = " SELECT * FROM orders ";
			$sql .= " WHERE ticket_id = {$ticket_id} ";

			$result = $db->query($sql);
			confirm($result);
			
			return $result;
		}


		public function get_by_event_id($event_id){
			global $db;

			$sql  = " SELECT * FROM orders ";
			$sql .= " WHERE event_id = {$event_id} ";

			$result = $db->query($sql);
			confirm($result);
			
			return $result;
		}



		public function get_by_buyer_id($buyer_user_id){
			global $db;

			$sql  = " SELECT * FROM orders ";
			$sql .= " WHERE buyer_id = {$buyer_user_id} ";

			$result = $db->query($sql);
			confirm($result);
			
			return $result;
		}


		public static function delete($order_id){
			global $db;

			$sql  = "DELETE FROM orders ";
			$sql .= " WHERE id = {$order_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}


		public function delivered($order_id, $status = false){
			global $db;

			$sql = " UPDATE orders SET ";

			if($status){
				$sql .= " delivery_status = 1 ";
			}else{
				$sql .= " delivery_status = 0 ";
			}

			$sql .= " WHERE id = {$order_id} ";
			$sql .=" LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		public function total_amount(){
			global $db;

			$sql  = " SELECT amount FROM orders ";

			$result = $db->query($sql);
			confirm($result);

			if($orders_amount = $result->fetch_array()){

				$total_amount = array_sum($orders_amount);
			}
			
			return $total_amount;
		}
	}
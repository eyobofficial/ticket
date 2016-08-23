<?php
	require_once('database.php');

	class Delivery extends Generic {
		public $name;

		/**
		 * Get all delivery methods from database
		 */
		public static function get_methods(){
			global $db;

			$sql  = "SELECT * FROM delivery_methods ";
			
			return $db->query($sql);
		}


		/**
		 * Get a single delivery method and return the id
		 */
		public static function get_method($id){
			global $db;

			$sql  = "SELECT * FROM delivery_methods ";
			$sql .= " WHERE id = $id ";
			$sql .= " LIMIT 1 ";
			
			$query = $db->query($sql);

			$result = $query->fetch_object();

			return $result;
		}


		/**
		 * Get a delivery name by id
		 */
		public static function get_name($id){
			global $db;

			$sql  = "SELECT name FROM delivery_methods ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			if($result = $result_set->fetch_array()){
				return array_shift($result);
			}

		}


		/**
		 * Return the number of delivery methods
		 */
		public static function count(){
			global $db;

			$sql  = "SELECT COUNT(*) FROM delivery_methods ";
			
			$query = $db->query($sql);

			$result = $query->fetch_array();

			return array_shift($result);
		}


		/**
		 * Add delivery method 
		 */
		public static function add($name, $price){
			global $db;

			$sql  = "INSERT INTO delivery_methods ";
			$sql .= "(name, price_per_ticket) ";
			$sql .= " VALUES('{$name}', $price) ";

			$result = $db->query($sql);

			confirm($result);

			if($db->affected_rows > 0){
				return true;
			}else{
				return false;
			}
		}


		/**
		 * edit delivery method 
		 */
		public static function edit($id, $name, $price){
			global $db;

			$sql  = "UPDATE delivery_methods ";
			$sql .= " SET name = '{$name}', ";
			$sql .= " price_per_ticket = {$price} ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			if($db->affected_rows > 0 ){
				return true;
			}else{
				return false;
			}
		}

		/**
		 * delte delivery method 
		 */
		public static function delete($id){
			global $db;

			$sql  = "DELETE FROM delivery_methods ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";


			$result = $db->query($sql);

			confirm($result);

			if($db->affected_rows > 0 ){
				return true;
			}else{
				return false;
			}
		}



	}
<?php
	require_once('database.php');

	class Tax {
		public $id;
		public $name;
		public $rate;


		/**
		 * Intantiate object
		 */
		public function __construct($id = null){
			if(!is_null($id)){
				return $this->get($id);
			}
		}


		/**
		 * Get all tax
		 */
		public function get_all(){
			global $db;

			$sql  = " SELECT * FROM tax ";

			$result = $db->query($sql);

			confirm($result);

			return $result;
		}


		/**
		 * Get a row and assign to the properties
		 */
		public function get($id){
			global $db;

			$sql  = " SELECT * FROM tax ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			if($result = $result_set->fetch_object()){
				$this->id  = $result->id;
				$this->name = $result->name;
				$this->rate = $result->rate;


				return true;
			}		
		}



		/**
		 * Update rate
		 */
		public static function update_rate($id, $rate){
			global $db;

			$rate = (float)$rate;

			$sql  = " UPDATE tax ";
			$sql .= " SET rate = {$rate} ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}

	}


	/**
	 * Instantiate vat object
	 */
	$vat = new Tax(1);
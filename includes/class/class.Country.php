<?php
	require_once('database.php');

	class Country{
		public $country_id;
		public $country_name;
		public $country_code;
		protected $table = "countries";

		/**
		 * Retrieve all countries from the database
		 */
		public function get_countries(){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " ORDER BY country_name ASC ";

			$result_set = $db->query($sql);

			return $result_set;
		}

		/**
		 * Retrieve a single country record from the database and assign in to this object properties
		 */
		public function get_country($id){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE id = {$id} ";

			$result_set = $db->query($sql);

			if($result_set){
				$obj = $result_set->fetch_object();

				$this->country_id   = $obj->id;
				$this->country_name = $obj->country_name;
				$this->country_code = $obj->country_code;
			}else{
				echo "<br>";
				echo $sql;
				echo "<br>";
				die("Failed to fetch country record");
			}	
		}

		/**
		 * Getter Methods
		 */
		public function get_id(){
			return $this->country_id;
		}

		public function get_country_name(){
			return $this->country_name;
		}



		public function get_country_code(){
			return $this->country_code;
		}

		public function __construct($id = null){
			if(!is_null($id)){
				$this->get_country($id);
			}
		}



		public static function name_from_id($id){
			global $db;

			$sql  = "SELECT country_name FROM countries ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			if($result = $result_set->fetch_array()){

				return array_shift($result);
			}
		}


	}
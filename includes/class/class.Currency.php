<?php
	require_once("database.php");

	class Currency{
		public $id;
		public $name;
		public $code;
		public $rate;



		public function __construct($id = null){
			if(is_null($id)){
				return $this->get_all();
			}else{

				return $this->get($id);
			}
		}


		public function get($id){
			global $db;

			$sql  = " SELECT * FROM currency ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			if($result = $result_set->fetch_object()){
				$this->id  = $result->id;
				$this->code = strtoupper($result->code);
				$this->name = $result->name;
				$this->rate = $result->rate;


				return true;
			}		
		}


		public function get_all(){
			global $db;

			$sql  = " SELECT * FROM currency ";

			$result = $db->query($sql);

			confirm($result);

			return $result;
		}


		public function convert($amount){

			$amount = (float)$amount;

			return $amount * $this->rate;

		}



		public function convert_back($amount){

			$amount = (float)$amount;

			return $amount / $this->rate;

		}


		public static function update_rate($currency_code, $rate){
			global $db;

			$currency_code = $db->escape_string($currency_code);

			$rate = (float)$rate;

			$sql  = " UPDATE currency ";
			$sql .= " SET rate = {$rate} ";
			$sql .= " WHERE code = '{$currency_code}' ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}
	}


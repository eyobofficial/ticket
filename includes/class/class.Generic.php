<?php
	require_once('database.php');

	/**
	 * Generic Class For Inheriting 
	 */
	class Generic{
		public $table;

		/**
		 * Method returns object result from sql query
		 */
		public function match_sql($sql){
			global $db;

			$result = $db->query($sql);

			if(!$result){
				echo $sql;
				echo "<br>";
				die("Database query error");
			}

			return $result;
		}

		/**
		 * Method returns all records
		 */
		public function get_records(){
			global $db;

			$sql = "SELECT * FROM " . $this->table;
			return $this->match_sql($sql);
		}

		/**
		 * Method returns all records
		 */
		public function get_record($id = 0){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1";

			$result = $db->query($sql);

			if(!$result){
				echo $sql . "<br>";
				die("DATABASE QUERY ERROR. FAILED TO GET RECORD. ");
			}

			return $result;
		}

		/**
		 * Method delete a from table
		 */
		public function delete_old($id = 0){
			global $db;

			$sql  = "DELETE  FROM " . $this->table;
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1";

			return $db->query($sql);
		}

		/**
		 * Method checks if record exits in a table
		 */
		public static function check_record($record_id = 0, $test_table){
			global $db;

			$sql  = "SELECT * FROM " . $test_table;
			$sql .= " WHERE id = {$record_id} ";

			$result = $db->query($sql);

			if(!$result || empty($result)){
				return false;
			}else{
				return true;
			}
		}

		
	}
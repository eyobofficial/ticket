<?php
	require_once("database.php");

	/**
	 * Pagination class
	 */
	class Pagination {
		public $per_page;
		public $current_page;
		public $total_count;


		/**
		 * Construct Method
		 */
		public function __construct($per_page = 9, $current_page = 1, $total_count = 0){
			$this->per_page 	= $per_page;
			$this->current_page = $current_page;
			$this->total_count  = $total_count;
		}

		

		/**
		 * Method returns the total page number
		 */
		public  function total_page(){
			return (int)ceil($this->total_count / $this->per_page);
		}

		/**
		 * Method returns offset
		 */
		public function offset(){
			return $this->per_page * ($this->current_page - 1);
		}
	}
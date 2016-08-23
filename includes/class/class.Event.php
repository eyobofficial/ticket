<?php
	require_once('database.php'); 
	require_once('class.Country.php');

	/**
	 * 	Event class definition
	 */
	class Event{
		public $id;
		public $type_id;
		public $type;
		public $name;
		public $overview;
		public $venue;
		public $city;
		public $country_id = 210;
		public $country;
		public $date;
		public $position;
		public $visible;
		public $feautred;
		/*public $total_ticket;
		public $tickets_sold;
		public $tickets_left;
		public $amount;*/
		public $table = "events";
		public $photo;
		public $seating_photo;

		/**
		* Return records matching the sql
		*/	
		public function match_sql($sql){
				global $db;

				return $db->query($sql);
		}

		/**	
		*  Return all event records
		*/	
		public function get_all_events($option = "DESC", $parm = "id", $event_type = ""){
				global $db;

				$sql  = "SELECT * FROM " . $this->table;
				$sql .= " ORDER BY {$parm} {$option} ";

				switch(strtolower($event_type)){
					case "concert":
						$sql .= " WHERE event_type_id = 1 ";
						break;

					case "sport":
						$sql .= " WHERE event_type_id = 2 ";
						break;

					case "festival":
						$sql .= " WHERE event_type_id = 3 ";
						break;
				}

				return $this->match_sql($sql);
		}

		/**	
		*  Return all VISIBLE event records
		*/	
		public function get_events($option = "DESC", $parm = "id", $event_type = ""){
				global $db;

				$sql  = "SELECT * FROM " . $this->table;
				$sql .= " ORDER BY {$parm} {$option} ";
				$sql .= " WHERE visible = 1 ";

				switch(strtolower($event_type)){
					case "concert":
						$sql .= " AND event_type_id = 1 ";
						break;

					case "sport":
						$sql .= " AND event_type_id = 2 ";
						break;

					case "festival":
						$sql .= " AND event_type_id = 3 ";
						break;
				}

				return $this->match_sql($sql);
		}

		/**
		 * 	Return a single event record and 
		 * 	assigns to the respective attributes
		 */
		public function get_event($id=0){
			global $db;

			$sql = "SELECT * FROM " . $this->table . " WHERE id = {$id}";
			$result = $this->match_sql($sql);
			$event = $result->fetch_assoc();

			$this->id = $event['id'];
			$this->type_id = $event['event_type_id'];
			$this->type = $this->type($id); // A private method 
			$this->name = $event['name'];
			$this->overview = $event['overview'];
			$this->venue = $event['venue'];
			$this->city = $event['city'];
			$this->country_id = $event['country_id'];

			$this->date = strtotime($event['date']);
			$this->country = $this->get_country($event['country_id']);
			$this->position = $event['position'];
			$this->visible = $event['visible'] == 1 ? true : false;
			$this->featured = $event['featured'] == 1 ? true : false;

			if($event['photo'] === "NO_PHOTO" && $event['event_type_id'] == 1 ){
				$this->photo = "DEFAULT_CONCERT_EVENT.jpeg";
			}elseif($event['photo'] === "NO_PHOTO" && $event['event_type_id'] == 2 ){
				$this->photo = "DEFAULT_SPORT_EVENT.jpeg";
			}elseif($event['photo'] === "NO_PHOTO" && $event['event_type_id'] == 3){
				$this->photo = "DEFAULT_FESTIVAL_EVENT.jpeg";
			}elseif($event['photo'] === "NO_PHOTO" && empty($event['event_type_id'])){
				$this->photo = "DEFAULT_FESTIVAL_EVENT.jpeg";
			}else{
				$this->photo = $event['photo'];
			}

			if($event['seating_photo'] === "NO_SEATING_PHOTO"){
				$this->seating_photo = "NO_SEATING_PHOTO.jpg";
			}else{
				$this->seating_photo = $event['seating_photo'];
			}
		}

		/**
		 * Returns the total number of tickets sold
		 */
		public function tickets_sold(){

		}

		/**
		 * Returns the total amounts sold
		 */
		public function amount(){
			
		}

		/**
		 *  Returns event type from type_id
		 */
		public function type($id = null){
			global $db;

			$type_id = is_null($id) ? $this->type_id : (int)$id;
			$table = "event_type";

			$sql = "SELECT * FROM " . $table . " WHERE id = {$type_id}";
			$result = $db->query($sql);
			$event = $result->fetch_assoc();

			$this->type = $event['type'];

			return $event['type'];
		}

		/**
		 * Method checks if record exits in a table by id
		 */
		public function check_by_id($event_id = 0){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE id = {$event_id} ";

			$result = $db->query($sql);

			if(!$result || $result->num_rows == 0){
				return false;
			}else{
				return true;
			}
		}


		/**
		 * Get country name from id
		 */
		public function get_country($country_id){
			$country = new Country($country_id);
			return $country->country_name;
		}

		/**
		 * Add new event to the database
		 */
		public static function add($event_name,
						    $event_type_id,
						    $event_date, 
						    $event_overview = "",
						    $event_venue = "", 
						    $event_city = "", 
						    $event_country_id = 210, 
						    $event_visiblity = 1, 
						    $featured_status = 0 
						    ){
			global $db;

			// Prepapre and sanitaize user inputed values
			$event_name       = (string)trim($event_name);
			$event_type_id    = (int)($event_type_id);
			$event_date       = trim($event_date);
			$event_overview   = (string)trim($event_overview);
			$event_venue      = (string)trim($event_venue);
			$event_city       = (string)trim($event_city);
			$event_country_id = (int)$event_country_id;

			if(!isset($event_type_id) || empty($event_country_id)){
				$event_type_id = 3;
			}


			// Convert unix timestamp $event_date to mysql datetime format(YYYY-MM-DD HH-MM-SS)
			$event_date = strftime("%Y-%m-%d %H-%M-%S", $event_date);

			// Escape user inserted strings to avoid sql injection
			$event_name       = $db->real_escape_string($event_name);
			$event_overview   = $db->real_escape_string($event_overview);
			$event_date       = $db->real_escape_string($event_date);
			$event_venue      = $db->real_escape_string($event_venue);
			$event_city       = $db->real_escape_string($event_city);

			$sql  = "INSERT INTO " . "events";
			$sql .= " (name, event_type_id, overview, venue, city, country_id, date, visible, featured) ";
			$sql .= " VALUES('{$event_name}', {$event_type_id}, '{$event_overview}', '{$event_venue}', '{$event_city}', {$event_country_id}, '{$event_date}', {$event_visiblity}, {$featured_status})";

			$result = $db->query($sql);

			if(!$result){
				echo $sql;
				echo "<br>";
				echo $db->error;
				echo "<br>";
				die("Database query error");
			}else{
				return true;
			}
		}

		/**
		 * Method update/edit already inserted event record
		 */
		public static function update($event_id,
								$event_name, 
							    $event_type_id,
							    $event_date, 
							    $event_overview = "",
							    $event_venue = "", 
							    $event_city = "", 
							    $event_country_id, 
							    $event_visiblity = 1, 
							    $featured_status = 0 
						    ){
				global $db;

				// Escape user inserted strings to avoid sql injection
				$event_name = $db->real_escape_string($event_name);
				$event_overview = $db->real_escape_string($event_overview);
				$event_date = $db->real_escape_string($event_date);
				$event_venue = $db->real_escape_string($event_venue);
				$event_city = $db->real_escape_string($event_city);

				// Convert unix timestamp $event_date to mysql datetime format(YYYY-MM-DD HH-MM-SS)
				$event_date = strftime("%Y-%m-%d %H-%M-%S", $event_date);

				$sql = "UPDATE events " . " SET ";
				$sql .= " name = '{$event_name}', ";
				$sql .= " event_type_id = {$event_type_id}, ";
				$sql .= " date = '{$event_date}', ";
				$sql .= " overview = '{$event_overview}', ";
				$sql .= " venue = '{$event_venue}', ";
				$sql .= " city = '{$event_city}', ";
				$sql .= " country_id = {$event_country_id}, ";
				$sql .= " visible = {$event_visiblity}, ";
				$sql .= " featured = {$featured_status} ";
				$sql .= " WHERE id = {$event_id} ";
				$sql .= " LIMIT 1";

				// Perform query
				$result = $db->query($sql);

				// Confirm query
				if(!$result){
					echo $sql;
					die("Database Update Failed");
				}else{
					return true;
				}
			}

		/**
		 * Method delete event record
		 */
		public function delete($event_id){
			global $db;

			// Check if event exists in database
			if($this->check_by_id($event_id)){
				// Check for ticket package and delete if exits
				$ticket = new Ticket;
				$ticket->delete($event_id);

				$sql  = "DELETE FROM " . $this->table;
				$sql .= " WHERE id = {$event_id} ";
				$sql .= " LIMIT 1";

				// Perform query
				$result = $db->query($sql);

				// Confirm query 
				if(!$result){
					die("Failed to delete event");
				}

				// Delete photo and photo dir
				// Delete photo first
				if(file_exists(PHOTO_LIB . DS . (string)($event_id) . DS . "event_photo.jpg")){
					$delete_photo = unlink(PHOTO_LIB . DS . (string)($event_id) . DS . "event_photo.jpg");

					if($delete_photo){
						$delete_dir = rmdir(PHOTO_LIB . DS . (string)($event_id));

						if($delete_dir){
							return true;
						}else{
							die("Failed to delete photo dir");
						}
					}else{
						die("Failed to delete photo");
					}
				}else{
					return true;
				}
			}
		} // END delete()

		/**
		 * Method returns total events
		 */
		public function total_record($event_type = ""){
			global $db;

			$sql  = "SELECT COUNT(id) FROM ";
			$sql .= $this->table;
			$sql .= " WHERE visible = 1 ";

			switch(strtolower($event_type)){
				case "concert":
					$sql .= " AND event_type_id = 1 ";
					break;

				case "sport":
					$sql .= " AND event_type_id = 2 ";
					break;

				case "festival":
					$sql .= " AND event_type_id = 3 ";
					break;
			}


			$result = $db->query($sql);
			$record_count = $result->fetch_array();

			if($result){
				return array_shift($record_count);
			}
		}


		/**
		 * Method returns VISIBLE events using LIMIT, OFFSET and WHERE
		 */
		public function match_page($per_page = 5, $offset = 0, $event_type = ""){
			global $db;

			$sql  = "SELECT * FROM ";
			$sql .= $this->table;
			$sql .= " WHERE visible = 1 ";

			switch(strtolower($event_type)){
				case "concert":
					$sql .= " AND event_type_id = 1 ";
					break;

				case "sport":
					$sql .= " AND event_type_id = 2 ";
					break;

				case "festival":
					$sql .= " AND event_type_id = 3 ";
					break;
			}

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;


			$result = $db->query($sql);
	
			if($result){
				return $result;
			}
		}

		/**
		 * Method returns events using LIMIT, OFFSET and WHERE
		 */
		public function match_all_page($per_page = 5, $offset = 0, $event_type = ""){
			global $db;

			$sql  = "SELECT * FROM ";
			$sql .= $this->table;

			switch(strtolower($event_type)){
				case "concert":
					$sql .= " WHERE event_type_id = 1 ";
					break;

				case "sport":
					$sql .= " WHERE event_type_id = 2 ";
					break;

				case "festival":
					$sql .= " WHERE event_type_id = 3 ";
					break;
			}

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;


			$result = $db->query($sql);
		
			if($result){
				return $result;
			}
		}


		/**
		 * Method returns featured event count
		 */
		public function featured_count(){
			global $db;

			$sql  = "SELECT COUNT(id) FROM ";
			$sql .= $this->table;
			$sql .= " WHERE visible= 1 ";
			$sql .= " AND featured = 1 ";


			$result = $db->query($sql);
			$record_count = $result->fetch_array();

			if($result){
				return array_shift($record_count);
			}
		}


		/**
		 * Return featured events with a pagination functionality
		 */

		public function featured_with_page($per_page = 5, $offset = 0){
			global $db;

			$sql  = "SELECT * FROM ";
			$sql .= $this->table;
			$sql .= " WHERE visible = 1 ";

			$sql .= " AND featured = 1 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;


			$result = $db->query($sql);
		
			if($result){
				return $result;
			}
		}


		/**
		 * Return featured events with LIMIT
		 */
		public function featured($per_page = 5){
			global $db;

			$sql  = "SELECT * FROM ";
			$sql .= $this->table;
			$sql .= " WHERE visible = 1 ";

			$sql .= " AND featured = 1 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;


			$result = $db->query($sql);
		
			if($result){
				return $result;
			}
		}


		/**
		 * Return recent eventss with LIMIT
		 */
		public function recent($per_page = 5){
			global $db;

			$sql  = "SELECT * FROM ";
			$sql .= $this->table;
			$sql .= " WHERE visible = 1 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;


			$result = $db->query($sql);
		
			if($result){
				return $result;
			}
		}



		/**
		 * Search for an event
		 */
		public function search($query_string = ""){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$sql .= " WHERE visible = 1 ";
			$sql .= " ORDER BY date DESC ";

			$result = $db->query($sql);
		}



		public function search_all($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";


			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}

		public function search_all_paginated($keyword, $per_page, $offset){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}


		public function count_search_all($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT count(id) FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR country LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}


		/**
		 * Search for concert events
		 */
		public function search_concerts($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 1 ";


			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}

		public function search_concerts_paginated($keyword, $per_page, $offset){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 1 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}


		public function count_search_concert($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT count(id) FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR country LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}



		/**
		 * Search for sport events
		 */
		public function search_sports($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 2 ";


			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}

		public function search_sports_paginated($keyword, $per_page, $offset){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 2 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}


		public function count_search_sports($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT count(id) FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR country LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 2 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}



		/**
		 * Search for festivals events
		 */
		public function search_festivals($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 3 ";


			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}

		public function search_festivals_paginated($keyword, $per_page, $offset){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 3 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}


		public function count_search_festivals($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT count(id) FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR country LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND event_type_id = 3 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}



		/**
		 * Search for festivals events
		 */
		public function search_featured($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND featured = 1 ";


			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}

		public function search_featured_paginated($keyword, $per_page, $offset){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND featured = 1 ";

			$sql .= " ORDER BY id DESC ";
			$sql .= " LIMIT " . $per_page;
			$sql .= " OFFSET " . $offset;

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}


		public function count_search_featured($keyword){
			global $db;

			$keyword = $db->escape_string($keyword);

			$sql  = "SELECT count(id) FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR country LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";
			$sql .= " AND visible = 1 ";
			$sql .= " AND featured = 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}





		/**
		 * Constructor magic method
		 */
		public function __construct($id = 0){
			if($id == 0){
				$this->get_events();
			}elseif($id !== 0){
				$this->get_event($id);
			}
		}
	} 
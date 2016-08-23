<?php
	require_once('database.php');
	/**
	 * User Class
	 */
	class User extends Generic{
		public $id;
		public $username;
		public $email;
		public $password;
		public $privilege;
		public $first_name;
		public $last_name;
		public $fullname;
		public $photo;
		public $table = "users";



		public function __construct($user_id = 0){
			if($user_id > 0){
				$this->get_user_by_id($user_id);
			}
		}

		/**
		 * Method returns a user
		 */
		public function get_user_by_id($id = 0){
			global $db;

			$sql  = "SELECT * FROM users ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result_set = $db->query($sql);

			confirm($result_set);

			if($result = $result_set->fetch_object()){
				$this->id         = $result->id;
				$this->email      = $result->email;
				$this->password   = $result->password;
				$this->first_name = $result->first_name;
				$this->last_name  = $result->last_name;
				$this->fullname   = $this->fullname();
				$this->photo      = $result->picture;
				$this->privilege  = $result->priv_type_id;
			}
		}

		/**
		 * Method returns all users
		 */
		public function get_users(){
			global $db;

			return parent::get_records();
		}

		/**
		 * Method returns public registered users
		 */
		public function get_public_users(){
			global $db;

			$sql  = " SELECT * FROM users ";
			$sql .= " WHERE priv_type_id = 3 ";

			$result = $db->query($sql);

			confirm($result, $sql);

			return $result;
		}


		/**
		 * Method returns all admins (EXCEPT the superadmin)
		 */
		public function get_admins(){
			global $db;

			$sql  = " SELECT * FROM users ";
			$sql .= " WHERE priv_type_id = 2 ";

			$result = $db->query($sql);

			confirm($result, $sql);

			return $result;
		}



		/**
		 * Method returns user fullname
		 */
		private function fullname(){
			return $this->first_name . " " . $this->last_name;
		}


		public static function check_by_email($email = "", $user_id = null){
			global $db;

			$sql  = "SELECT COUNT(*) FROM users ";
			$sql .= " WHERE email = '{$email}' ";

			if(!is_null($user_id)){
				$sql .= " AND id <> {$user_id} ";
			}

			$result = $db->query($sql);
			$record_count = array_shift($result->fetch_array());

			if($record_count >= 1){
				return true;
			}else{
				return false;
			}
		}


		public static function check_admin_by_email($email = ""){
			global $db;

			$sql  = "SELECT COUNT(*) FROM users ";
			$sql .= " WHERE email = '{$email}' ";
			$sql .= " AND priv_type_id < 3 ";

			$result = $db->query($sql);
			$record_count = array_shift($result->fetch_array());

			if($record_count >= 1){
				return true;
			}else{
				return false;
			}
		}


		public static function add($first_name, $last_name, $email, $password, $privilege_id = 3){
			global $db;

			// Hash password
			$password = password_hash($password, PASSWORD_DEFAULT);

			$first_name = strtolower($first_name);
			$last_name  = strtolower($last_name);
			$email      = strtolower($email);

			$sql  = "INSERT INTO users ";
			$sql .= " (first_name, last_name, email, password, priv_type_id) ";
			$sql .= " VALUES('{$first_name}', '{$last_name}', '{$email}', '{$password}', {$privilege_id}) ";

			$result = $db->query($sql);

			if(!$result){
				//echo $sql . "<br>";
				return false;
			}else{
				return true;		}
		}
		


		public static function add_admin($first_name, $last_name, $email, $password, $privilege_id = 2){
			global $db;

			// Hash password
			$password = password_hash($password, PASSWORD_DEFAULT);

			$first_name = strtolower($first_name);
			$last_name  = strtolower($last_name);
			$email      = strtolower($email);

			$sql  = "INSERT INTO users ";
			$sql .= " (first_name, last_name, email, password, priv_type_id) ";
			$sql .= " VALUES('{$first_name}', '{$last_name}', '{$email}', '{$password}', {$privilege_id}) ";

			$result = $db->query($sql);

			if(!$result){
				//echo $sql . "<br>";
				return false;
			}else{
				return true;		}
		}



		public static function match_password($email, $password = ""){
			global $db;


			$sql  = "SELECT password FROM users ";
			$sql .= " WHERE email = '{$email}' ";
			$sql .= " LIMIT 1 ";

			$password_result = $db->query($sql);
			$password_hash = $password_result->fetch_object()->password;

			return password_verify($password, $password_hash);
		}


		// Update the password
		public static function update_password($password, $user_id){
			global $db;

			$password = trim($password);

			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			$sql  = "UPDATE users ";
			$sql .= " SET password = '{$hashed_password}' ";
			$sql .= " WHERE id = {$user_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}


		public static function get_id_by_email($email = ""){
			global $db;

			if(Self::check_by_email($email)){
				$sql  = "SELECT id FROM users ";
				$sql .= " WHERE email = '{$email}' ";
				$sql .= " LIMIT 1 ";

				$result = $db->query($sql);

				return array_shift($result->fetch_array());
			}
		}


		public static function check_by_id($id = 0){
			global $db;

			$sql  = "SELECT COUNT(*) FROM users ";
			$sql .= " WHERE id = {$id} ";

			$result = $db->query($sql);
			$record_count = array_shift($result->fetch_array());

			if($record_count >= 1){
				return true;
			}else{
				return false;
			}

		}


		public static function delete($id = 0){
			global $db;

			// Check if user exists
			if(self::check_by_id($id)){
				$sql = "DELETE FROM users ";
				$sql .= " WHERE id = {$id} ";
				$sql .= " LIMIT 1 ";

				$result = $db->query($sql);

				if($result && $db->affected_rows === 1){

					Cart::delete_by_user_id($id);
					return true;
				}else{
					return false;
				}
			}
		}


		/**
		 * This method updates only first_name, last_name & email fields
		 */
		public static function basic_edit($user_id, $first_name, $last_name, $email){
			global $db;

			$sql  = "UPDATE users ";
			$sql .= " SET first_name = '{$first_name}', ";
			$sql .= " last_name = '{$last_name}', ";
			$sql .= " email = '{$email}' ";
			$sql .= " WHERE id = {$user_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		public static function get_priv($id = 0){
			global $db;

			if(self::check_by_id($id)){
				$sql  = "SELECT priv_type_id FROM users ";
				$sql .= " WHERE id = {$id} ";

				$result = $db->query($sql);

				return array_shift($result->fetch_array());
			}
		}


		public static function get_super_admin_id(){
			global $db;

			$sql  = " SELECT * FROM users ";
			$sql .= " WHERE priv_type_id = 1 ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return array_shift($result->fetch_array());
		}


		/**
		 * Check if a user is admin or superadmin
		 */
		public function is_admin($user_id){
			global $db;

			$priv_id = (int)SELF::get_priv($user_id);

			if($priv_id < 3){
				return true;
			}
		}



		/**
		 * Check if a user is superadmin or superadmin
		 */
		public function is_superadmin($user_id){
			global $db;

			$priv_id = (int)SELF::get_priv($user_id);

			if($priv_id === 1){
				return true;
			}
		}


		
	} /******** End of User Class **************/
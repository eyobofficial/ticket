<?php
	require_once('database.php');
	require_once('class.User.php');


	class Message {
		public $id;
		public $sender_id;
		public $reciever_id;
		public $sender_email;
		public $sender_username;
		public $subject;
		public $text;
		public $stamp;
		public $seen;
		public $table = 'messages';


		public function __construct($message_id = null, $admin = false){
			if(!is_null($message_id)){
				if($admin){
					return $this->get_message($message_id);
				}else{
					return $this->get_public_message($message_id);
				}
				
			}
		}



		/**
		 * Get all recieved messages by user id
		 */
		public function  get_recieved(){
			global $db;


			$user_id = $_SESSION['logged_admin_id'];

			
			$sql  = "SELECT * FROM message ";
			$sql .= " WHERE reciever_id = {$user_id} ";
			$sql .= " ORDER BY stamp DESC ";

			$messages = $db->query($sql);

			confirm($messages);

			return $messages;
		}


		public function  get_public_recieved(){
			global $db;

			$user_id = $_SESSION['logged_user_id'];

			$sql  = "SELECT * FROM message ";
			$sql .= " WHERE reciever_id = {$user_id} ";
			$sql .= " ORDER BY stamp DESC ";

			$messages = $db->query($sql);

			confirm($messages);

			return $messages;
		}





		/**
		 * Get all send messages by user id
		 */
		public function get_sent(){
			global $db;

			$user_id = $_SESSION['logged_admin_id'];

			$sql  = "SELECT * FROM message ";
			$sql .= " WHERE sender_id = {$user_id} ";

			$messages = $db->query($sql);

			confirm($messages);

			return $messages;
		}

		/**
		 * Get one messages by user id and message id
		 */
		public function get_message($message_id){
			global $db;

			$user_id = $_SESSION['logged_admin_id'];

			$sql  = "SELECT * FROM message ";
			$sql .= " WHERE reciever_id = {$user_id} ";
			$sql .= " AND id = {$message_id} ";
			$sql .= " LIMIT 1 ";

			$message_result = $db->query($sql);

			confirm($message_result);

			if($message = $message_result->fetch_object()){
				$this->id = $message->id;

				if(isset($message->sender_id) && (int)$message->sender_id > 0){
					$this->sender_id = $message->sender_id;
					$sender = new User($message->sender_id);

					$this->sender_email = $sender->email;
				}else{
					$this->sender_email = "(Guest)";
				}
				
				$this->reciever_id = $message->reciever_id;
				$this->subject = $message->subject;
				$this->text = $message->text;
				$this->sender_id = $message->sender_id;
				$this->stamp = strtotime($message->stamp);
				$this->seen = $message->seen;

				// Make message seen
				if($this->seen($message_id)){
					return true;
				}
			}
		}


		/**
		 * Get one messages by user id and message id
		 */
		public function get_public_message($message_id){
			global $db;

			$user_id = (int)$_SESSION['logged_user_id'];


			$sql  = "SELECT * FROM message ";
			$sql .= " WHERE reciever_id = {$user_id} ";
			$sql .= " AND id = {$message_id} ";
			$sql .= " LIMIT 1 ";

			$message_result = $db->query($sql);

			confirm($message_result);

			if($message = $message_result->fetch_object()){
				$this->id = $message->id;

				$this->reciever_id = $message->reciever_id;
				$this->subject = $message->subject;
				$this->text = $message->text;
				$this->sender_id = $message->sender_id;
				$this->stamp = strtotime($message->stamp);
				$this->seen = $message->seen;

				// Make message seen
				if($this->seen($message_id)){
					return true;
				}

			}
		}


		/**
		 * Get new message by user id
		 */
		public function get_new(){
			global $db;

			$user_id = $_SESSION['logged_admin_id'];

			$sql  = "SELECT * FROM message ";
			$sql .= " WHERE seen = 0 ";

			$messages = $db->query($sql);

			confirm($messages);

			return $messages;
		}


		/**
		 * Get new message count
		 */
		public function new_count($admin = false){
			global $db;

			$user_id = $admin ? (int)$_SESSION['logged_admin_id'] : (int)$_SESSION['logged_user_id'];

			$sql  = "SELECT COUNT(*) FROM message ";
			$sql .= " WHERE seen = 0 ";

			$count_result = $db->query($sql);

			confirm($count_result);

			return(array_shift($count_result->fetch_array()));
		}

		/**
		 * Get new message count - STATIC METHOD
		 */
		public static function msg_count($admin = false){
			global $db;


			//$user_id = $admin ? (int)$_SESSION['logged_admin_id'] : (int)$_SESSION['logged_user_id'];

			if(isset($_SESSION['logged_admin_id'])){

				$user_id = (int)$_SESSION['logged_admin_id'];

			}elseif(isset($_SESSION['logged_user_id'])){

				$user_id = (int)$_SESSION['logged_user_id'];

			}else{
				$user_id = 0;
			}

			$sql  = "SELECT COUNT(*) FROM message ";
			$sql .= " WHERE reciever_id = {$user_id} ";
			$sql .= " AND seen = 0 ";

			$count_result = $db->query($sql);

			confirm($count_result);

			return(array_shift($count_result->fetch_array()));
		}


		/**
		 * Send message
		 *
		 */
		public static function send($to_user_id, $subject, $message = "", $admin = false){
			global $db;

			$from_user_id = $admin ? (int)$_SESSION['logged_admin_id'] : (int)$_SESSION['logged_user_id'];

			if(empty($subject)){
				$subject = "(no subject)";
			}

			$subject = $db->real_escape_string($subject);
			$message = $db->real_escape_string($message);

			$sql  = " INSERT INTO message ";
			$sql .= " (sender_id, reciever_id, subject, text) ";
			$sql .= " VALUES({$from_user_id}, {$to_user_id}, '{$subject}', '{$message}' )";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}

		public function seen($message_id){
			global $db;

			$sql  = "UPDATE message ";
			$sql .= " SET seen = 1 ";
			$sql .= " WHERE id = {$message_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		/**
		 * Delete a message by id
		 */
		public static function delete($message_id){
			global $db;

			$sql  = " DELETE FROM message ";
			$sql .= " WHERE id = {$message_id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);


			confirm($result);

			return true;
		}





	}/****************  End Message *******************************/
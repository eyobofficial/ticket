<?php
	class Website {
		protected $title;
		protected $tagline;
		protected $email;
		protected $facebook;
		protected $twitter;
		protected $youtube;
		protected $phone;


		public function __construct(){
			global $db;

			$sql  = "SELECT * FROM website ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			if($website = $result->fetch_object()){
				$this->title   	= $website->title;
				$this->tagline 	= $website->tagline;
				$this->email   	= $website->email;
				$this->phone   	= $website->phone;
				$this->facebook = $website->facebook;
				$this->twitter  = $website->twitter;
				$this->youtube   = $website->youtube;
			}
		}



		// Getter Methods

		public function title(){
			return $this->title;
		}

		public function tagline(){
			return $this->tagline;
		}


		public function email(){
			return $this->email;
		}


		public function phone(){
			return $this->phone;
		}



		public function facebook(){
			return $this->facebook;
		}


		public function twitter(){
			return $this->twitter;
		}


		public function youtube(){
			return $this->youtube;
		}







		/**
		 * Setter Methods
		 */

		// Set title
		public function set_title($title, $id = 1){
			global $db;

			$title = $db->real_escape_string($title);
			$title = strtolower($title);


			$sql  = "UPDATE website ";
			$sql .= " SET title = '{$title}' ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}

		// Set tagline
		public function set_tagline($tagline, $id = 1){
			global $db;

			$tagline = $db->real_escape_string($tagline);
			$tagline = strtolower($tagline);


			$sql  = "UPDATE website ";
			$sql .= " SET tagline = '{$tagline}' ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}

		// Set email
		public function set_email($email, $id = 1){
			global $db;

			$email = $db->real_escape_string($email);
			$email = strtolower($email);


			$sql  = "UPDATE website ";
			$sql .= " SET email = '{$email}' ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}


		// Set phone
		public function set_phone($phone, $id = 1){
			global $db;

			$phone = $db->real_escape_string($phone);
			$phone = strtolower($phone);


			$sql  = "UPDATE website ";
			$sql .= " SET phone = '{$phone}' ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}


		// Set facebook
		public function set_facebook($facebook, $id = 1){
			global $db;

			$facebook = $db->real_escape_string($facebook);
			$facebook = strtolower($facebook);


			$sql  = "UPDATE website ";
			$sql .= " SET facebook = '{$facebook}' ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		// Set twitter
		public function set_twitter($twitter, $id = 1){
			global $db;

			$twitter = $db->real_escape_string($twitter);
			$twitter = strtolower($twitter);


			$sql  = "UPDATE website ";
			$sql .= " SET twitter = '{$twitter}' ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}



		// Set youtube
		public function set_youtube($youtube, $id = 1){
			global $db;

			$youtube = $db->real_escape_string($youtube);
			$youtube = strtolower($youtube);


			$sql  = "UPDATE website ";
			$sql .= " SET youtube = '{$youtube}' ";
			$sql .= " WHERE id = {$id} ";
			$sql .= " LIMIT 1 ";

			$result = $db->query($sql);

			confirm($result);

			return true;
		}




	}
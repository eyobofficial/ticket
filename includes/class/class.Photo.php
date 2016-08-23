<?php
	require_once("database.php");

	class Upload {
		public $tmp_file;
		public $target_file = "event_photo.jpg";
		public $target_path;
		public $error;
		public $size;
		public $type;
		public $dir_name;

		function __construct($dir_name, $upload = false, $file = "photo", $target_file = null, $photo_type = 1){
			if(isset($_FILES[$file]) && $_FILES[$file]['error'] == 0 ){

				$this->tmp_file    = $_FILES[$file]['tmp_name'];
				$this->target_file = is_null($target_file) ? "event_photo.jpg" : $target_file;
				$this->target_path = (string)($dir_name . DS . $this->target_file);
				$this->dir_name    = (string)($dir_name);
				$this->error       = $_FILES[$file]['error'];
				$this->size        = $_FILES[$file]['size'];
				$this->type        = $_FILES[$file]['type'];

				if($upload == true){
					$this->upload_photo($photo_type, $dir_name);
				}
			}	
		}


		public function upload_photo($photo_type = 1, $event_id,  $table = "events"){
			global $db;

			$escaped_target_path = $db->real_escape_string($this->target_path);
			//$event_id = $db->insert_id;

			file_exists(PHOTO_LIB) ? null : mkdir(SITE_ROOT. DS . "public" . DS . "pictures" . DS . "event_photos");
			file_exists(PHOTO_LIB . DS . $this->dir_name) ? null : mkdir(PHOTO_LIB . DS . $this->dir_name);

			if($photo_type == 1 ){
				$col = "photo";
			}else{
				$col = "seating_photo";
			}

			$sql  = "UPDATE {$table} SET $col = '$escaped_target_path' ";
			$sql .= " WHERE id = $event_id ";
			$sql .= " LIMIT 1 ";

			if(move_uploaded_file($this->tmp_file, PHOTO_LIB . DS . $this->target_path)){
				$result = $db->query($sql);

				if(!$result){
					header("Location: index.php?failed=photo&error=" . urlencode($this->error));
					exit;
				}else{
					return true;
				}
			}else{
				header("Location: index.php?failed=photo&error=" . urlencode($this->error));
				exit;
			}

		}


	} // END OF Upload Class
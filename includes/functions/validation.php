<?php
		// Check for presence
		function has_presence($value){
			return isset($value) && $value !== "";
			}

		// Validate Presence
		function validate_presence($required_fields){
			global $errors;

			foreach($required_fields as $field){
				$value = trim($_POST[$field]);

				if(!has_presence($value)){
					$errors[$field] = ucfirst(str_replace("_", " ", $field)) . " can not be blank.";
				}
			}
		}


		// Diplay error message as list
		function form_errors($errors = array()){
			if(!empty($errors)){
				$output = "<div class=\"errors\">";
				$output .= "<ul>";
					foreach($errors as $error){
						$output .= "<li>";
						$output .= $error;
						$output .= "</li>";
					}
				$output .= "</ul>";
				$output .= "</div>";
				return $output;
			  }else{
			  	return null;
			  }
			
		}


<?php
	if(isset($_POST['submit'])){
		// Intialize empty error array
		$errors = array();

		
		$event_name    = (string)trim($_POST['name']);
		$event_venue   = (string)trim($_POST['venue']);
		$event_city    = (string)trim($_POST['city']);
		$event_country = (int)(trim($_POST['country']));
		$event_date    = strtotime(trim($_POST['date']));
		$overview      = (string)trim($_POST['overview']);



		$event_fields   = array();

		$event_fields[] = $event_name;
		$event_fields[] = $event_venue;
		$event_fields[] = $event_city;
		$event_fields[] = $event_country;
		$event_fields[] = $event_date;
		$event_fields[] = $overview;

		foreach($event_fields as $field){
			echo ucwords($field);
			echo "<br>";
		}


		echo "<hr>";

		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
	}
<?php
	$countries = new Country;
	$all_countries = $countries->get_countries();

	// Intialize empty error array
	$errors = array();

	if(isset($_POST['submit'])){
		$required_fields = array("name", "venue", "city", "country", "date", "event_type_id");
	
		$event_name       = (string)trim($_POST['name']);
		$event_type_id    = isset($_POST['event_type_id']) ? (int)($_POST['event_type_id']) : 3;
		$event_venue      = (string)trim($_POST['venue']);
		$event_city       = (string)trim($_POST['city']);
		$event_country_id = (int)($_POST['country']);
		$event_overview   = (string)trim($_POST['overview']);


		$event_featured  = (int)($_POST['featured']);
		$event_visiblity = (int)($_POST['visible']);


		// Event date parameters
		$year = (int)($_POST['year']);
		$month = (int)($_POST['month']);
		$date = (int)($_POST['date']);
		$hour = (int)($_POST['hour']);
		$minute = (int)($_POST['minute']);
		$second = 0;

		$event_date = mktime($hour, $minute, $second, $month, $date, $year);



		//Validate presence
		validate_presence($required_fields);

		if(empty($errors)){
			if(Event::add($event_name, $event_type_id, $event_date, $event_overview, $event_venue, $event_city, $event_country_id, $event_visiblity, $event_featured)){

				// Get the new inserted event id
				$new_event_id = $db->insert_id;

				$event_file_name = "photo";
				$seating_file_name = "ticket_photo";
				$seating_target_file = "seating_photo.jpg";

				// Upload photo
				$photo_upload = new Upload($new_event_id, true);

				$ticket_photo_upload = new Upload($new_event_id, true, $seating_file_name, $seating_target_file, 2);

				// Ticket Packages
				$packages = array();

				$package_title     = $_POST['package_title'];
				$package_currency  = $_POST['package_currency'];
				$package_prices    = $_POST['package_price'];
				$package_available = $_POST['package_available'];

				foreach($package_title as $key=>$value){
					$packages[$key]['title'] = $value;
				}

				foreach($package_currency as $key=>$value){
					$packages[$key]['currency'] = $value;
				}

				foreach($package_prices as $key=>$value){
					$packages[$key]['price'] = $value;
				}

				foreach($package_available as $key=>$value){
					$packages[$key]['available'] = $value;
				}


				// Add ticket packages to the database
				if(!empty($packages)){
					foreach($packages as $package){
						if(empty($package) || empty($package['title'])){
							continue;
						}

						$ticket = new Ticket;
						$result = $ticket->add($new_event_id, 1, $package['title'], $package['price'], $package['currency'], $package['available']);

						if(!$result){
							header("Location: index.php?failed=ticket");
							exit;
						}
					}
				}

				// No error - Success
				header("Location: index.php?status=success");
				exit;

			}else{
				header("Location: index.php?failed=event");
				exit;
			}
		}

	}else{
		$event_name    = "";
		$event_venue   = "";
		$event_city    = "";
		$event_city    = "";
		$event_country = "";
		$event_date    = "";
		$overview      = "";
	}
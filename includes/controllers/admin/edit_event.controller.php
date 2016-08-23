<?php
	$countries = new Country;
	$all_countries = $countries->get_countries();


	if(isset($_GET['event_id'])){
		$event_id = (int)($_GET['event_id']);

		$event = new Event($event_id);

		$tickets = new Ticket;

		$all_tickets = $tickets->get_by_event_id($event_id);
	}else{
		header("Location: all_events.php");
		exit;
	}


	if(isset($_POST['submit'])){

		$errors = array();
		$required_fields = array("name", "venue", "city", "country", "date", "event_type_id");
		
		$event_id 		  = (int)trim($_GET['event_id']);
		$event_name       = (string)trim($_POST['name']);
		$event_type_id    = (int)trim($_POST['event_type_id']);
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
			if(Event::update($event_id, $event_name, $event_type_id, $event_date, $event_overview, $event_venue, $event_city, $event_country_id, $event_visiblity, $event_featured)){

				// Get the new inserted event id
				$event_file_name = "photo";
				$seating_file_name = "ticket_photo";
				$seating_target_file = "seating_photo.jpg";

				// Upload photo
				$photo_upload = new Upload($event_id, true);

				$ticket_photo_upload = new Upload($event_id, true, $seating_file_name, $seating_target_file, 2);

				// Ticket Packages
				$packages = array();

				$package_id        = $_POST['package_id'];
				$package_title     = $_POST['package_title'];
				$package_currency  = $_POST['package_currency'];
				$package_prices    = $_POST['package_price'];
				$package_available = $_POST['package_available'];


				foreach($package_id as $key=>$value){
					$packages[$key]['id'] = $value;
				}

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

						if(isset($package['id'])){
							if((!isset($package['title']) || empty($package['title']))){

								$ticket->remove($package['id']);

							}else{

									if(!$result = $ticket->update($package['id'], 
														  	 $logged_admin->id, 
														  	 $package['title'], 
														  	 $package['price'], 
														  	 $package['currency'], 
														  	 $package['available'])){


									// Failed to new ticket
									header("Location: all_events.php?s=failed&e=1");
									exit;
								} 
							} 
							

						}else{

							if(!$result = $ticket->add($event_id, 
													   $logged_admin->id, 
													   $package['title'], 
													   $package['price'], 
													   $package['currency'], 
													   $package['available'])){


									// Failed to new ticket
									header("Location: all_events.php?s=failed&e=2");
									exit;
							} // end if


						} // end else

						

						
					}
				}

				// No error - Success
				header("Location: index.php?status=success");
				exit;

			}else{
				header("Location: index.php?failed=event?f=2");
				exit;
			}
		}

	}
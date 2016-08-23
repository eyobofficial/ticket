<?php
	if(isset($_POST['submit'])){ // i.e Bulk action is applied
		$bulk_action = $_POST['bulk_action'];
		if(isset($_POST['event_id'])){
			$event_ids = array();

			foreach($_POST['event_id'] as $event_id){
				$event_ids[] = $event_id;
			}
		}

		switch($bulk_action){
			// Publish
			case 1: 


			break;

			// Unpublish
			case 2: 

			break;

			// Make Featured
			case 3:

			break;

			// Move to Trash
			case 4:
				if(!empty($event_ids)){
					$event = new Event;

					foreach($event_ids as $event_id){
						$event->delete($event_id);
					}
				}

				header("Location: all_events.php");
				exit;
			break;

			// Default
			default:
				$tickets = new Ticket;
				$all_tickets = $tickets->get_tickets();
			break;

		}// End Swith($bulk_action)

	}else{
		$tickets = new Ticket;
		$all_tickets = $tickets->get_tickets();
	} // End of else for if(isset($_POST))
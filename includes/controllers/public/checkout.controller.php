<?php
	if(isset($_POST['guest_submit'])){
		$errors['guest'] = array();

		$event_id = isset($_POST['event_id']) ? (int)$_POST['event_id'] : 0;
		$_SESSION['guest']['event_id'] = $event_id;

		$ticket_id = isset($_POST['ticket_id']) ? (int)$_POST['ticket_id'] : 0;
		$_SESSION['guest']['ticket_id'] = $ticket_id;

		$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
		$_SESSION['guest']['quantity'] = $quantity;

		$event = new Event($event_id);
		$ticket = new Ticket($ticket_id);

		$sub_total = $quantity * $ticket->price;
		$_SESSION['guest']['sub_total'] = $sub_total;

		if(isset($_POST['first_name']) && !empty(trim($_POST['first_name']))){
			$first_name = strtolower((trim($_POST['first_name'])));
			$_SESSION['guest']['first_name'] = $first_name;

		}else{
			$errors['guest']['first_name'] = "Please fill your first name";
		}

		if(isset($_POST['last_name']) && !empty(trim($_POST['last_name']))){
			$last_name = strtolower((trim($_POST['last_name'])));
			$_SESSION['guest']['last_name'] = $last_name;

		}else{
			$errors['guest']['last_name'] = "Please fill your last name";
		}

		if(isset($_POST['email']) && !empty(trim($_POST['email']))){
			$email = strtolower((trim($_POST['email'])));
			$_SESSION['guest']['email'] = $email;


		}else{
			$errors['guest']['email'] = "Please fill your email";
		}

		if(isset($_POST['update_me']) && $_POST['update_me'] == 1){
			$update_me = true;
		}else{
			$update_me = false;
		}

		$_SESSION['guest']['update_me'] = $update_me;

		if(empty($errors['guest'])){
			header("Location: delivery.php?u=guest");
			exit;
		}

	// If a user is trying to logged in	
	}elseif(isset($_POST['login_submit'])){

		$errors['login'] = array();


		$event_id = isset($_POST['event_id']) ? (int)$_POST['event_id'] : 0;
		$_SESSION['login']['event_id'] = $event_id;

		$ticket_id = isset($_POST['ticket_id']) ? (int)$_POST['ticket_id'] : 0;
		$_SESSION['login']['ticket_id'] = $ticket_id;

		$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
		$_SESSION['login']['quantity'] = $quantity;

		$event = new Event($event_id);
		$ticket = new Ticket($ticket_id);

		$sub_total = $quantity * $ticket->price;
		$_SESSION['login']['sub_total'] = $sub_total;



		// If user is already logged
		if(isset($logged_user)){
			$errors['login']['is_logged'] = "A user is already logged in. Please logout first.";
		}

		if(isset($_POST['email']) && !empty(trim($_POST['email']))){
			$email = strtolower((trim($_POST['email'])));
		

		}else{
			$errors['login']['username'] = "Please fill your email or username";
		}	


		if(isset($_POST['password']) && !empty(trim($_POST['password']))){
			$password = strtolower((trim($_POST['password'])));
			

		}else{
			$errors['login']['password'] = "Please fill your password";
		}

		if(empty($errors['login'])){
			// Check if user exists
			if(User::check_by_email($email)){
				// User record exits
				if(User::match_password($email, $password)){
					// Successfully logged
					$_SESSION['logged_user_id'] = User::get_id_by_email($email);

					header("Location: delivery.php?u=logged");
					exit;
					
				}else{
					// Loggin failed
					$errors['login']['password'] = "You entered a wrong username or password. Please try again.";
				}


			}else{
				// User is NOT registered
				$errors['login']['not_registered'] = "You are not registered yet. Please <a href='register.php' title='login'>register here</a> or use the guest checkout.";
			}
		}	

	}else{
		// Default when no form is submitted

		// Redirect back if no event or ticket is selected
		if(!isset($_GET['event_id']) || !isset($_GET['ticket_id'])){
			if(isset($_GET['event_id'])){
				$event_id = (int)$_GET['event_id'];
				header("Location: event.php?id={$event_id}");
				exit;
			}else{
				header("Location: events.php");
				exit;
			}
		}


		$events = array();



		$event_id = (int)($_GET['event_id']);
		$ticket_id = (int)($_GET['ticket_id']);

		if(!isset($_GET['quantity']) || empty($_GET['quantity'])){
			$quantity = 1;
		}else{
			$quantity = (int)$_GET['quantity'];
		}


		$event = new Event($event_id);
		$ticket = new Ticket($ticket_id);

		$sub_total = $quantity * $ticket->price;
	}



	
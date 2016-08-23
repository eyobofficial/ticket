<?php
	$website = new Website;

	if(isset($_POST['submit'])){
		
		$errors = array();

		$title      = isset($_POST['site_title']) ? strtolower(trim($_POST['site_title'])) : "";
		$tagline    = isset($_POST['tagline'])    ? strtolower(trim($_POST['tagline'])) : "";
		$email      = isset($_POST['email'])      ? strtolower(trim($_POST['email'])) : "";
		$phone      = isset($_POST['phone'])      ? strtolower(trim($_POST['phone'])) : "";
		$facebook   = isset($_POST['facebook'])   ? strtolower(trim($_POST['facebook'])) : "";
		$twitter    = isset($_POST['twitter'])    ? strtolower(trim($_POST['twitter'])) : "";
		$youtube    = isset($_POST['youtube'])    ? strtolower(trim($_POST['youtube'])) : "";


		// Check and validate if form is filled

		if(empty($title)){
			$errors['title'] = "Website Title cannot be empty";
		}


		if(empty($email)){
			$errors['email'] = "Email cannot be empty";
		}


		// If no error
		if(empty($errors)){

			if(! $website->set_title($title)){
				$errors['title_db'] = "The system is unable to add the website title at this time. Please try again.";
			}


			if(! $website->set_tagline($tagline)){
				$errors['tagline_db'] = "The system is unable to add the tagline at this time. Please try again.";
			}


			if(! $website->set_email($email)){
				$errors['email_db'] = "The system is unable to add the email address at this time. Please try again.";
			}

			if(! $website->set_phone($phone)){
				$errors['phone_db'] = "The system is unable to add the phone address at this time. Please try again.";
			}


			if(! $website->set_facebook($facebook)){
				$errors['facebook_db'] = "The system is unable to add the facebook link at this time. Please try again.";
			}


			if(! $website->set_twitter($twitter)){
				$errors['twitter_db'] = "The system is unable to add the twitter link at this time. Please try again.";
			}


			if(! $website->set_youtube($youtube)){
				$errors['youtube_db'] = "The system is unable to add the youtube link at this time. Please try again.";
			}


			if(empty($errors)){
				header("Location: index.php?s=success");
				exit;
			}
			
		}

	}else{

		$title   	= $website->title();
		$tagline 	= $website->tagline();
		$email   	= $website->email();
		$phone   	= $website->phone();
		$facebook   = $website->facebook();
		$twitter    = $website->twitter();
		$youtube    = $website->youtube();
	}
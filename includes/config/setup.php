<?php
	$website = new Website;

	// Website Name: 
	defined("WEBSITE_NAME") ? null : define("WEBSITE_NAME", $website->title());


	// Tagline: 
	defined("TAGLINE") ? null : define("TAGLINE", $website->tagline());


	// Email
	defined("EMAIL") ? null : define("EMAIL", $website->email());


	// Phone
	defined("PHONE") ? null : define("PHONE", $website->phone());


	// Facebook
	defined("FACEBOOK") ? null : define("FACEBOOK", $website->facebook());

	// Twitter
	defined("TWITTER") ? null : define("TWITTER", $website->twitter());


	// Youtube
	defined("YOUTUBE") ? null : define("YOUTUBE", $website->youtube());
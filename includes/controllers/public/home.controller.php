<?php
	$featured_per_page = 4;
	$recent_per_page = 9;

	$event = new Event;

	$featured_events = $event->featured($featured_per_page);
	$recent_events   = $event->recent($recent_per_page);
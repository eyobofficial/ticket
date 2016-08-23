<?php
	$page_number = isset($_GET['page_number']) ? (int)($_GET['page_number']) : 1;
	$per_page = 9;

	$events = new Event;
	$event_count = $events->featured_count();
	$pagination = new Pagination($per_page, $page_number, $event_count);

	$all_events = $events->featured_with_page($per_page, $pagination->offset());
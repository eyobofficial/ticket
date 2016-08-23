<?php
	$page_number = isset($_GET['page_number']) ? (int)($_GET['page_number']) : 1;
	$per_page = 9;
	$event_type = "sport";

	$events = new Event;
	$event_count = $events->total_record($event_type);
	$pagination = new Pagination($per_page, $page_number, $event_count);

	$all_events = $events->match_page($per_page, $pagination->offset(), $event_type);	
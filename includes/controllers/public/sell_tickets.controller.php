<?php
	$events = new Event;
	
	$concert_events  = $events->match_sql("SELECT * FROM events WHERE event_type_id = 1 AND visible = 1 LIMIT 5");
	$sport_events    = $events->match_sql("SELECT * FROM events WHERE event_type_id = 2 AND visible = 1 LIMIT 5");
	$festival_events = $events->match_sql("SELECT * FROM events WHERE event_type_id = 3 AND visible = 1 LIMIT 5");
<?php
	if(isset($_GET['q'])){

		$keyword = strtolower(trim($_GET['q']));

		$page_number = isset($_GET['page_number']) ? (int)($_GET['page_number']) : 1;
		$per_page = 9;

		$events = new Event;
		//$event_results = $events->search_all($keyword);

		$result_count = $events->search_featured($keyword)->num_rows;
		$pagination = new Pagination($per_page, $page_number, $result_count);

		$event_results = $events->search_featured_paginated($keyword, $per_page, $pagination->offset());

		if($events->search_featured($keyword)->num_rows == 0){
			$search_errors['empty'] = 'No featured event result matched your search. Try again with a diffrent keyword.';
		}



	}else{
		header("Location: events.php");
		exit;
	}


<?php
	require_once('database.php');

	class Search {

		public static function by_event_name($keyword = ""){
			global $db;

			$sql  = "SELECT id FROM events ";
			$sql .= " WHERE name LIKE '%{$keyword}%' ";
			$sql .= " OR venue LIKE '%{$keyword}%' ";
			$sql .= " OR city LIKE '%{$keyword}%' ";
			$sql .= " OR country LIKE '%{$keyword}%' ";
			$sql .= " OR overview LIKE '%{$keyword}%' ";

			$result_set = $db->query($sql);

			confirm($result_set);

			return $result_set;
		}
	}
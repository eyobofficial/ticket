<?php
	require_once(LIB_PATH . 'config.php');

	/**
	 * Creating database connection object
	 */
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check for database connection error
	if($db->connect_errno){
		die("Database Connection Error: " . $db->connect_error . "(" . $db->connect_errno . ")");
	}
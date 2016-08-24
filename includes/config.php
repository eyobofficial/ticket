<?php
	// Directory Separator
	defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

	// Website Root Path
	defined("SITE_ROOT") ? null : define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT'] . DS . "ticket" . DS);

	// Library Path
	defined("LIB_PATH") ? null : define("LIB_PATH", SITE_ROOT . "includes" . DS);


	// Class Path
	defined("CLASS_PATH") ? null : define("CLASS_PATH", LIB_PATH . "class" . DS);


	// Functions Path
	defined("FUNC_PATH") ? null : define("FUNC_PATH", LIB_PATH . "helpers" . DS);


	// Config Path
	defined("CONFIG_PATH") ? null : define("CONFIG_PATH", LIB_PATH . "config" . DS);


	// Event photo library
	defined("PHOTO_LIB") ? null : define("PHOTO_LIB", SITE_ROOT . "public" . DS . "pictures" . DS . "event_photos");


	// Public Controllers path
	defined("PC") ? NULL : define("PC", LIB_PATH . 'controllers' . DS . 'public' . DS);

	// Admin Controllers path
	defined("AC") ? NULL : define("AC", LIB_PATH . 'controllers' . DS . 'admin' . DS);





	/**
	 * Connection constants
	 */
	define("DB_HOST", "localhost");
	define("DB_USER", "web");
	define("DB_PASS", "1234");
	define("DB_NAME", "ticket");
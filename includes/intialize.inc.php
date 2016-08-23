<?php
	session_start();

	// Configuration files
	require_once("config.php");

	// Functions
	require_once(FUNC_PATH . "functions.php");
	require_once(FUNC_PATH . "validation.php");


	// Class files
	require_once(CLASS_PATH . "database.php");
	require_once(CLASS_PATH . "class.Generic.php");
	require_once(CLASS_PATH . "class.Tax.php");
	require_once(CLASS_PATH . "class.Website.php");
	require_once(CLASS_PATH . "class.Currency.php");

	// Payment configuration
	require_once(CONFIG_PATH . "config.payment.php");


	// Class Files
	require_once(CLASS_PATH . "class.Event.php");
	require_once(CLASS_PATH . "class.Ticket.php");
	require_once(CLASS_PATH . "class.User.php");

	// Session config
	require_once(CONFIG_PATH . "config.session.php");


	// Class files
	require_once(CLASS_PATH . "class.Message.php");
	require_once(CLASS_PATH . "class.Pagination.php");
	require_once(CLASS_PATH . "class.Country.php");
	require_once(CLASS_PATH . "class.Photo.php");
	require_once(CLASS_PATH . "class.Delivery.php");
	require_once(CLASS_PATH . "class.Cart.php");
	require_once(CLASS_PATH . "class.Orders.php");
	require_once(CLASS_PATH . "class.Search.php");
	


	if(isset($page_title)){
		require_once(LIB_PATH . "route.php");
	}


	// configurations
	require_once(CONFIG_PATH . "config.currency.php");

	require_once(CONFIG_PATH . "setup.php");
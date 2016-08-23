<?php
	/**
	 * Payment Constants
	 */


	/**
	 * VAT
	 * must be entered in decimal - Example: 0.15 for 15%, 0.12 for 12% etc..
	 */
	defined("VAT") ? NULL : define("VAT", $vat->rate); // i.e 15%




	/**
	 *  Stripe payement gateway api constants
	 */
	defined('STRIPE_PUBLISHABLE_KEY') ? null : define('STRIPE_PUBLISHABLE_KEY', 'pk_test_Sv4qILZDRdGnD7AHY9UGRxI3'); // the secret stripe key
	defined('STRIPE_SECRET_KEY') ? null : define('STRIPE_SECRET_KEY', 'sk_test_mkLtEcGQyJo7JPbamaO9GHMR'); // the publishable stripe key
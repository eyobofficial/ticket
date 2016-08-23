<?php
	
	if(isset($page_context) && strtolower($page_context) === "admin"){
		/**
		 * Admin Page Controllers
		 */

		switch(strtolower($page_title)){

			// general_settings.php
			case "general settings":
				require_once(AC . 'general_settings.controller.php');
			break;


			// account_settings.php
			case "account settings":
				require_once(AC . 'account_settings.controller.php');
			break;

			// change_password.php
			case "change password":
				require_once(AC . 'change_password.controller.php');
			break;


			// currency.php
			case "currency rates":
				require_once(AC . 'currency.controller.php');
			break;


			// tax.php
			case "tax":
				require_once(AC . 'tax.controller.php');
			break;


			// login.php
			case "login":
				require_once(AC . 'login.controller.php');

			break;


			// all_events.php	   
			case "all events":
				require_once(AC . 'all_events.controller.php');
			break;


			case "event":
				require_once(AC . 'event.controller.php');
			
			break;



			// all_events.php	   
			case "all tickets":
				require_once(AC . 'all_tickets.controller.php');
			break;


			// admin ticket.php
			case "ticket":
				require_once(AC . 'ticket.controller.php');
			
			break;



			// admin user_tickets.php
			case "user tickets":
				require_once(AC . 'user_tickets.controller.php');
			
			break;


			// admin user_ticket.php
			case "user ticket":
				require_once(AC . 'user_ticket.controller.php');
			
			break;



			// all_users.php	   
			case "all users":
				require_once(AC . 'all_users.controller.php');

			break;


			// all_admins.php	   
			case "all admins":
				require_once(AC . 'all_admins.controller.php');

			break;

			// admin page add_event.php
			case "add event":
				require_once(AC . 'add_event.controller.php');

			break; // END add_event.php

			// admin page edit_event.php
			case "edit event":
				require_once(AC . 'edit_event.controller.php');
		
			break;


			// admin page edit_event.php
			case "all messages":
				require_once(AC . 'all_messages.controller.php');
			
			break;


			// admin page message.php
			case "message":
				require_once(AC . 'message.controller.php');
			
			break;

			// admin page send_message.php
			case "send message":
				require_once(AC . 'send_message.controller.php');
			
			break;


			// admin page process_delete_message.php
			case "process delete message":
				require_once(AC . 'process_delete_message.controller.php');
			
			break;


			// admin page send_admin.php
			case "send admin":
				require_once(AC . 'send_admin.controller.php');
			
			break;


			// admin user.php
			case "user":
				require_once(AC . 'user.controller.php');
			
			break;


			// admin delete_user.php
			case "delete user":
				require_once(AC . 'delete_user.controller.php');
			
			break;


			// admin user.php
			case "admin":
				require_once(AC . 'admin.controller.php');
			
			break;


			// admin add_admin.php
			case "add admin":
				require_once(AC . 'add_admin.controller.php');
			
			break;


			// admin edit_admin.php
			case "edit admin":
				require_once(AC . 'edit_admin.controller.php');
			
			break;


			// admin delete_admin.php
			case "delete admin":
				require_once(AC . 'delete_admin.controller.php');
			
			break;


			// admin all_delivery.php
			case "all delivery":
				require_once(AC . 'all_delivery.controller.php');
			
			break;

			// admin delivery.php
			case "delivery":
				require_once(AC . 'delivery.controller.php');
			
			break;


			// admin add_delivery.php
			case "add delivery":
				require_once(AC . 'add_delivery.controller.php');
			
			break;


			// admin edit_delivery.php
			case "edit delivery":
				require_once(AC . 'edit_delivery.controller.php');
			
			break;


			// admin edit_delivery.php
			case "delete delivery":
				require_once(AC . 'delete_delivery.controller.php');
			
			break;


			// logout.php (admin page)
			case "logout":
				require_once(AC . 'logout.controller.php');
			break;


			// test.php (admin page)
			case "test":
				require_once(AC . 'test.controller.php');
			break;


			// process_delete_ticket.php (admin page)
			case "process delete ticket":
				require_once(AC . 'process_delete_ticket.controller.php');
			break;


			// all_orders.php (admin page)
			case "all orders":
				require_once(AC . 'all_orders.controller.php');
			break;


			// order.php (admin page)
			case "order":
				require_once(AC . 'order.controller.php');
			break;


			// process_order_delete.php (admin page)
			case "process order delete":
				require_once(AC . 'process_order_delete.controller.php');
			break;



			default:

			break;
		}/********* End admin page controllers ***************/




	}else{
		/**
		 * Public page controllers starts
		 */
		switch(strtolower($page_title)){

			// process_currency.php
			case "process currency":
				require_once(PC . 'process_currency.controller.php');
			break;

			// index.php
			case "home":
				require_once(PC . 'home.controller.php');
			break;


			case "featured events":
				require_once(PC . 'featured_events.controller.php');
			break;


			case "events":
				require_once(PC . 'events.controller.php');
				
			break;



			// concerts.php
			case "concerts":
				require_once(PC . 'concerts.controller.php');
				
			break;

			// sports.php
			case "sports":
				require_once(PC . 'sports.controller.php');
					
			break;

			// festivals.php
			case "festivals":
				require_once(PC . 'festivals.controller.php');
				
			break;

			//event.php with a certain get query
			case "event":
				require_once(PC . 'event.controller.php');
			break;


			// SELL TICKETS - (sell.php)
			case "sell tickets":
				require_once(PC . 'sell_tickets.controller.php');
			break; // End sell tickets (sell.php) page


			/**
			 * SELL EVENT - (sell_event.php)
			 */
			case "sell events":
				require_once(PC . 'sell_events.controller.php');
				
			break; // End sell_event.php


			case "checkout":
				require_once(PC . 'checkout.controller.php');
			break;



			case "delivery":
				require_once(PC . 'delivery.controller.php');
			break; // End delivery.php



			case "payment":
				require_once(PC . 'payment.controller.php');
			break; // End payment.php


			case "buy":
				require_once(PC . 'buy.controller.php');
			break; // End buy.php



			case "paymentx":
				require_once(PC . 'paymentx.controller.php');
			break; // End payment.php


			case "register":
				require_once(PC . 'register.controller.php');
			break;

			case "login":
				require_once(PC . 'login.controller.php');
			break;

			case "logout":
				require_once(PC . 'logout.controller.php');
			break;

			case "shopping cart":
				require_once(PC . 'cart.controller.php');
			break;

			case "add to cart":
				require_once(PC . 'add_to_cart.controller.php');
			break;

			case "remove cart":
				require_once(PC . 'remove_cart.controller.php');
			break;

			// account.php - public
			case "account":
				require_once(PC . 'account.controller.php');
			break;


			// password.php - public
			case "change password":
				require_once(PC . 'password.controller.php');
			break;


			// search.php - public
			case "search events":
				require_once(PC . 'search_events.controller.php');
			break;



			// search_concerts.php - public
			case "search concerts":
				require_once(PC . 'search_concerts.controller.php');
			break;


			// search_sports.php - public
			case "search sports":
				require_once(PC . 'search_sports.controller.php');
			break;


			// search_festivals.php - public
			case "search festivals":
				require_once(PC . 'search_festivals.controller.php');
			break;



			// search_featured.php - public
			case "search featured":
				require_once(PC . 'search_featured.controller.php');
			break;


			// search_sell.php - public
			case "search to sell":
				require_once(PC . 'search_sell.controller.php');
			break;


			// messages.php - public
			case "messages":
				require_once(PC . 'messages.controller.php');
			break;


			// message.php - public
			case "message":
				require_once(PC . 'message.controller.php');
			break;


			// send_message.php - public
			case "send message":
				require_once(PC . 'send_message.controller.php');
			break;


			// delete_message.php - public
			case "delete message":
				require_once(PC . 'delete_message.controller.php');
			break;


			default:


			break;

		}/**************** End Swith - for public page controllers */





	} /*********** End if condition ***********************************************/
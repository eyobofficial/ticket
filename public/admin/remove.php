<?php $page_status = "context"; ?>
<?php $page_title = "Remove"; ?>
<?php require_once('../../includes/intialize.inc.php'); ?>
<?php
	 if(isset($_GET['event_id'])){
		$event_id = $_GET['event_id'];
		$event = new Event();

		if($event->delete($event_id)){
			header("Location: all_events.php?status=deleted");
			exit;
		}else{
			header("Location: all_events.php?status=delete_failed");
			exit;
		}
	 }else{
	 	header("Location: index.php");
	 	exit;
	 }

	$db->close(); 
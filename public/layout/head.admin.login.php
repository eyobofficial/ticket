<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="Abel Tariku">
	<meta name="viewport" content="width=device-width, intital-scale=1.0">
	<title>
		<?php echo !isset($page_title) ? "Admin"  : "Admin" . " | " . ucwords($page_title); ?>
	</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/admin.css">
</head>
<body>
<div id="wrapper" class="page <?php echo isset($page_title) ? strtolower(str_replace(" ", "_", $page_title)) . 'Page' : ""; ?>  <?php echo isset($page_title) && strtolower($page_title) !== "home" ? 'allEventsPage' : null; ?>">
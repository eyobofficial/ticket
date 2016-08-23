<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="Abel Tariku">
	<meta name="viewport" content="width=device-width, intital-scale=1.0">
	<title>
		<?php echo !isset($page_title) ?  ucwords(WEBSITE_NAME) : ucwords(WEBSITE_NAME) . " - " . ucwords($page_title) ; ?>
	</title>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/main.css">
	<link rel="stylesheet" type="text/css" href="../public/css/sandbox.css">
</head>
<body>
	<div id="wrapper" class="page <?php echo isset($page_title) ? strtolower($page_title) . 'Page' : null; ?>  <?php echo isset($page_title) && strtolower($page_title) !== "home" ? 'allEventsPage' : null; ?>">
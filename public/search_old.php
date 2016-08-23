<?php
	if(isset($_GET['search'])){
		echo "Searching....";
	}else{
		header("Location: index.php");
		exit;
	}
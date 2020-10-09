<?php
//Create database connection
	$dbhost = "localhost";
	$dbuser = "hamidkar_main";
	$dbpass = "22?&iee1)#b*";
	$dbname = "hamidkar_graves";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//Test for successful connection.
	if (mysqli_connect_errno()) {
		header("Location: database_error.php");
		exit;
	}
?>
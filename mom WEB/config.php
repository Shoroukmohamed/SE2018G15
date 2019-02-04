<?php
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "mom";

	$db = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$db) 
	{
    	die("Connection failed: " . mysqli_connect_error());
	}
?>

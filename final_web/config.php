<?php
	$servername = "sql311.epizy.com";
	$username = "epiz_23455142";
	$password = "7QXe8FF1Jlgm";
	$dbname = "epiz_23455142_MOM";
     
	$db = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$db) 
	{
    	die("Connection failed: " . mysqli_connect_error());
	}
?>
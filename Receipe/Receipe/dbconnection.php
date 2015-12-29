<?php

	$userName = "a9416947_melz";
	$password = "afc4life";
	$serverName = "server23.000webhost.com";
	$dbName = "a9416947_cook";

	//$serverName = "localhost";
	//$userName = "root";
	//$password = "";
	//$dbName = "receipe";

	$conn = mysqli_connect($serverName,$userName,$password,$dbName);

	if(!$conn)
	{
		die("Connection failed".mysqli_connect_error());
	}
	else
	{
		//echo "Connection Sucess";
	}

?>
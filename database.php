<?php

$servername = 'localhost';
$username = 'root';
$password = "";
$database = "db_test";

try
{
	$connection = new mysqli($servername, $username, $password, $database);	
	if(!$connection)
	{
		echo $connection->error;
	}
}catch(exception $e)
{
	$e->getMessage();
	$connection->close();
}




?>
<?php 

$host = "localhost";
$dbName = "labone";
$userName = "root";
$password = "";

try {

	$con = new PDO ("mysql:host={$host}; dbname={$dbName}", $userName, $password);
	
} catch (PDOException $e) {
	
	echo "ERROR:".$e->getMessage();

}

 ?>
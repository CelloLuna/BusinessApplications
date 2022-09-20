<?php
$host="localhost";
$dbName="cellodb";
$userName="root";
$password="";

try {

    $con = new PDO ("mysql:host={$host}; dbname={$dbName}", $userName, $password);
    //echo "Connection OK"; 

} catch (PDOException $e) {

	echo "Error: ".$e->getMessage();

}
?>
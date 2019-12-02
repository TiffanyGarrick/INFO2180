<?php

$host = "localhost";
$username = "jholloway"; //for testing purpose
$password = "INFO2180final!"; //for testing purpose
$database = "bugme";
$message = "";
try{
	$connect = new PDO("mysql:host=$host; dbname=$database", $username , $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error){
	$message = $error->getMessage();
}

$statement = $connect->query("SELECT * FROM issues");
$issues = $statement->fetchAll(PDO::FETCH_ASSOC);


require 'dashboardpage.php';
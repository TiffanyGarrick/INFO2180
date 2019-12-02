<?php
session_start();
//connect to server and select database
$con = mysqli_connect("localhost","finalproject_user","info2180","info2180Project");

if($con){
    echo "Connection successful";
}else{
    echo "No connection made";
}

/*
$email=$POST['email'];
$password=$POST['password'];

//preventing mysql injection
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);


chema//query databse for user
$result = mysql_query("select * from Users where email = '$email' and password = '$password'") 
or die("Failed to query database ". mysql_error());
$row = mysql_fetch_array($result);
if($row['email']==$email && $row['password']==$password){
    echo "Login successful! Welcome = " .$row['email'];
}else{
    echo "Login failed. Sorry";
}

SOMETHING NEW AFTER THIS
/*

//create mysql connection
$mysql = new mysqli($host,$email,$password);
if($mysqli->connect_errno){
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

//creating database
if( !$mysqli->query('CREATE DATABASE Users') ){
    printf("Error message: %s\n", $mysqli->error);
}

//create users table with all fields
$mysqli->query('CREATE TABLE Users
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    password VARCHAR(32) NOT NULL,
    email VARCHAR(100) DEFAULT NULL,
    date_joined DATE DEFAULT GETDATE()
);') or die($mysqli->error);
*/
?>
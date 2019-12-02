<?php
ob_start();
session_start();
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
if (isset($_POST["loginbtn"])){
		if(empty($_POST["email"]) || empty($_POST["password"])){
			$message = '<label>All fields are required</label>';
		}
		else{
			$email = $_POST['email'];
			$pword = $_POST['password'];
			$query = "SELECT email, password FROM users WHERE email = :email AND password = :pword";
			$stmt = $database->prepare($query);
    		$stmt->bindParam('email', $email, PDO::PARAM_STR);
    		$stmt->bindValue('password', $password, PDO::PARAM_STR);
    		$stmt->execute();
    		$count = $stmt->rowCount();
    		$row   = $stmt->fetch(PDO::FETCH_ASSOC);
			if($count == 1 && !empty($row)) {
				if(password_verify($_POST['password'], $row['password'])){
					$_SESSION["email"] = $_POST["email"];
					header('location:/dashboardpage.php');
					exit;
				}
				else{
					$message = '<label>Wrong password</label>';
				}
			}else{
				$message = '<label>Wrong Data</label>';
			}
		}
	}
ob_end_flush();
?>
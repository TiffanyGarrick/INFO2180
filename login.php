<?php
ob_start();
session_start();
$host = "localhost";
$username = "root"; //for testing purpose
$password = ""; //for testing purpose
$database = "bugme";
$message = "";
try{
	$connect = new PDO("mysql:host=$host; dbname=$database", $username , $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error){
	echo("Can't open the database.");
}
if (isset($_POST["loginbtn"])){
		if(empty($_POST["email"]) || empty($_POST["password"])){
			echo '<script type="text/JavaScript"> alert("All fields are required");</script>';
		}
		else{
			$email = $_POST['email'];
			$pword = $_POST['password'];
			$hash = password_hash($password, PASSWORD_BCRYPT);
		print_r($hash);
			$query = "SELECT * FROM users WHERE email = ?";
			$statement = $connect->prepare($query);
			$statement->execute([$_POST['email']]);
			$user = $statement->fetchAll(PDO::FETCH_OBJ);
			//print_r($user[0]->password);
			echo '\n\n\n';
			print_r($_POST['password']);
			if(isset($user[0]))
			{
				if(md5($_POST['password']) == $user[0]->password){
					$_SESSION["email"] = $_POST["email"];
					header('location:dashboardpage.php');
					exit;
				  }
				  else{
					  echo '<script type="text/JavaScript"> alert("Wrong password");</script>';
				  }
			}
			/* if(!empty($row)){
				if(password_verify($_POST['password'], $row['password'])){
					$_SESSION["email"] = $_POST["email"];
					header('location:dashboardpage.php');
					exit;
				}
				else{
					$message = '<label>Wrong password</label>';
				}
			}else{
				$message = '<label>Wrong Data</label>';
			} */
		}
	}
ob_end_flush();
?>
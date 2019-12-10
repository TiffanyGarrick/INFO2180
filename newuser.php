<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();
$host = "localhost";
$username = "root"; //for testing purpose
$pword = ""; //for testing purpose
$database = "bugme";
$message = "";
    if(isset($_POST['submit'])){
        //dump($_POST);
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/" , $password)){
            $message .= "Password is weak";
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message .= "Email not valid";
        }

        
        
        try{
            $conn = new PDO("mysql:host=$host;dbname=$database", $username, $pword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
               $select_stmt=$conn->prepare("SELECT * FROM users 
                      WHERE email=:uemail"); // sql select query
               
               $select_stmt->execute(array(':uemail'=>$email)); //execute query 
               $row=$select_stmt->fetch(PDO::FETCH_ASSOC); 
               
               if($row["email"]==$email){
                $message .= "Email exists"; //check condition email already exists 
               }
               else //check no "$errorMsg" show then continue
               {
                 $hash = md5($password);
                
                $insert_stmt=$conn->prepare("INSERT INTO users (firstame, lastname, password, email) VALUES
                            (:fname, :lname, :upassword,:uemail)");   //sql insert query     
                
                if($insert_stmt->execute(array( ':fname' =>$firstname, 
                                                ':lname' =>$lastname,
                                                ':upassword'=>$hash,
                                                ':uemail'=>$email))){
                         
                 header("location('dashboardpage.php')");
                }
               }
        }
        catch(PDOException $e){
            $e->getMessage();
        }
        
    }else{
        echo "Submit not set";
    }

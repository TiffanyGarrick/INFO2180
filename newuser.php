<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //dump($_POST);
        
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP), PASSWORD_DEFAULT);
        
        if(empty($firstname)){
            echo 'First name is empty<br/>';
        }
        
        if(empty($lastname)){
            echo 'Last name is empty<br/>';
        }
        
        if(!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0.9])(?=.{8,})")){
            echo 'Password is weak';
        }
        
        if(!$email){
            echo 'That email is not valid!<br/>';
        }
        
        try{
            $conn = new PDO("mysql:host=localhost;dbname=schema", email, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Users (FirstName, LastName, Password, Email) VALUES ($firstname, $lastname, $password, $email)";
            $conn->exec($sql);
            echo "New record created successfully";
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
    }
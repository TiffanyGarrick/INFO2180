<?php

session_start();

if (!empty($_POST)){
    if ( isset($_POST['email']) && isset($_POST['password']) ){
        include("database.php");
        $database = new Database();
        $conn = $database->getConnection();
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bindParam('s', $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();
        
        if (password_verify($_POST['password'], $user->password)){
            $_SESSION['user_id'] = $user->ID;
        }
        
        header("Location: ../dashboard.php");
    }
}?>
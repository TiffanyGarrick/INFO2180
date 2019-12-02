<?php
session_start();
$_SESSION['message']='';

//connecting to mysql database
$mysqli = new mysqli('localhost', 'info2180_user', '@info2180Project', 'info2180Project');
//ensure form is being submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    //setting post variables
    //$id;
    //$datejoined;
    $firstname = $mysqli->real_escape_string($_POST['firstname']);
    $lastname = $mysqli->real_escape_string($_POST['lastname']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); //hashing password
        
    //INSERTING values inside of SQL
    $sql = "INSERT INTO Users (firstname, lastname, password, email)" . "VALUES ('$firstname', '$lastname', '$password', '$email')";
        
    //if query is successful then redirect to welcome.php page
    if($mysqli->query($sql)===true){
        //$_SESSION['message'] = "Registration successful! Added $firstname $lastname to database";
        //header("location: welcome.php");
    }
    else{
        $_SESSION['message'] = "User could not be added to the database!";
    }
}
?>

<link rel="stylesheet" href="main.css" media="screen">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>
    <header>
        <div class="headertitle">
            <h4><i class="fas fa-bug" style="padding-right: 15px; padding-left: 10px;"></i>BugMe Issue Tracker</h4>
        </div>
    </header>
    <aside>
        <div class="hometab">
            <a href="dashboard.html"><i class="fas fa-home" style="padding-right: 15px; padding-left: 10px;"></i>Home</a>
        </div>
        <div class="addusertab">
            <a href="creatingnewuser.php"><i class="fas fa-user-plus" style="padding-right: 10px; padding-left: 10px;"></i>Add User</a>
        </div>
        <div class="newissue">
            <a href="createissue.html"><i class="fas fa-plus-circle" style="padding-right: 15px; padding-left: 10px;"></i>New Issue</a>
        </div>
        <div class="logout">
            <a href="loginpage.html"><i class="fas fa-power-off" style="padding-right: 15px; padding-left: 10px;"></i>Log Out</a>
        </div>
    </aside>
    <main>
        <div class = "container">
            <h1>New User</h1>
            <form id="newuser" action="creatingnewuser.php" method="post">
                <div class="form-field">
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                </br>
            
                <div class="form-field">
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                </br>
                
                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                </br>
                
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="e.g. example@bugme.com" required>
                </div>
                </br>
                
                <button type="submit" name="submit" class="btn">Submit</button>
            </form>
        </div>
    </main>
</body>
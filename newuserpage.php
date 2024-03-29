<?php 
session_start();
if (!($_SESSION['email'] == "admin@bugme.com")){
    header('location:dashboardpage.php');
}
?>
<html>
    <head>
        <title>Bugme Tracker - Add User</title>
        <link rel="stylesheet" href="main.css" media="screen">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
        <script src="no-refresh.js" charset="utf-8"></script>
    </head>
    <body>
        <header>
            <div class="headertitle">
                <h4><i class="fas fa-bug" style="padding-right: 15px; padding-left: 10px;"></i>BugMe Issue Tracker</h4>
            </div>
        </header>
        <aside>
            <div class="hometab">
                <a href="dashboardpage.php"><i class="fas fa-home" style="padding-right: 15px; padding-left: 10px;"></i>Home</a>
            </div>
            <div class="addusertab">
                <a href="newuserpage.php"><i class="fas fa-user-plus" style="padding-right: 10px; padding-left: 10px;"></i>Add User</a>
            </div>
            <div class="newissue">
                <a href="createissue.php"><i class="fas fa-plus-circle" style="padding-right: 15px; padding-left: 10px;"></i>New Issue</a>
            </div>
            <div class="logout">
                <a href="logout.php"><i class="fas fa-power-off" style="padding-right: 15px; padding-left: 10px;"></i>Log Out</a>
            </div>
        </aside>
        <main>
            <div class = "container">
                <h1>New User</h1>
                <form id="newuser" action="newuser.php" method="post">
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
                        <input type="email" id="email" placeholder="e.g. example@bugme.com" required>
                    </div>
                    </br>
                
                    <button type="submit" name="submit" class="btn">Submit</button>
                </form>
            </div>
        </main>
    </body>
</html>
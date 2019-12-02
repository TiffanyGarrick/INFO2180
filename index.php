<?php include('login.php');?>
<html>
    <head>
        <title>BugMe Tracker</title>
        <link rel="stylesheet" href="main.css" media="screen">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
        <header>
            <div class="headertitle">
                <h4><i class="fas fa-bug" style="padding-right: 15px; padding-left: 10px;"></i>BugMe Issue Tracker</h4>
            </div>
        </header>
        <main class="main-login">
            <?php 
            if(isset($message)){
                echo '<label style="color: red; font-weight: bold;">'.$message.'</label>';
            }
            ?>
            <div class="container-login">
                <form class="login" action="" method="post">
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="email" placeholder="eg: example@bugme.com" name="email" required>
                    </div>
                    </br>
                    
                    <div class="form-field">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    </br>
                    <button type="submit" name="loginbtn">Login</button>
                </form>
            </div>
        </main>
    </body>
</html>
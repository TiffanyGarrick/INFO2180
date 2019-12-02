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
    $title = $mysqli->real_escape_string($_POST['type']);
    $description = $mysqli->real_escape_string($_POST['description']);
    $assigned = $mysqli->real_escape_string($_POST['search_categories_assign']);
    $priority = $mysqli->real_escape_string($_POST['search_categories_assign']);
    $type = $mysqli->real_escape_string($_POST['search_categories_type']);
    $priority = $mysqli->real_escape_string($_POST['search_categories_priority']);
        
    //create look through Users and if it matches $ASSIGNED then get ID
    $query = mysql_query("SELECT ID FROM Users WHERE Firstname, Lastname='$assigned'");

    if($mysqli->query($query)===true){
        //INSERTING values inside of SQL
        $sql = "INSERT INTO Issues (id, title, description, type_, priority, assigned_to , created_by)" . "VALUES ('$query', $title', '$description', '$type', '$priority', $assigned', '$assigned')";
    }

    if($mysqli->query($sql)===true){
        
    }
    else{
        $_SESSION['message'] = "User could not be added to the database!";
    }
}
?>

<link rel="stylesheet" href="createissue.css" media="screen">
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
            <h1>Create Issue</h1>
            <form id="createissue" action="createissue.php" method="post">
                <div class="form-field">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                </br>
            
                <div class="form-field">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required>
                </div>
                </br>
            
                <label for="assign">Assigned To</label>
                <div class="search_categories_assign">
                    <div class="select">
                        <select name="search_categories_assign" id="search_categories_assign">
                            <option>
                                <? 
                                $query = mysql_query("SELECT Firstname, Lastname FROM Users");
                                if ($mysqli->query($query)===true) {
                                    // Get field information for all fields
                                    while ($fieldinfo = mysqli_fetch_field($query)) {
                                        printf("%s\n", $fieldinfo -> Firstname + Lastname);
                                    }
                                mysqli_free_result($query);
                                }
                                ?>
                            </option>
                            <option value="1" selected="selected">Savannah Brown</option>
                            <option value="2">Required Admin</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                 </div>
                 <br>
                
                <label for="type">Type</label>
                <div class="search_categories_type">
                    <div class="select">
                        <select name="search_categories_type" id="search_categories_type">
                            <option value="1" selected="selected">Bug</option>
                            <option value="2">Proposal</option>
                            <option value="3">Task</option>
                        </select>
                    </div>
                 </div>
                 <br>
                 
                <label for="priority">Priority</label>
                <div class="search_categories_priority">
                    <div class="select">
                        <select name="search_categories_priority" id="search_categories_priority">
                            <option value="1" selected="selected">Minor</option>
                            <option value="2">Major</option>
                            <option value="3">Critical</option>
                        </select>
                    </div>
                 </div>
                 <br>
            
                <button type="submit" name="submit" class="btn">Submit</button>
            </form>
        </div>
    </main>
</body>
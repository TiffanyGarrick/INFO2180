<html>
    <head>
        <title>BugMe Tracker - Home</title>
        <link rel="stylesheet" href="dashboard.css" media="screen">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script type="text/javascript" src="filterbuttons.js"></script>
    </head>
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
                <a href="newuserpage.html"><i class="fas fa-user-plus" style="padding-right: 10px; padding-left: 10px;"></i>Add User</a>
            </div>
            <div class="newissue">
                <a href="newissue.html"><i class="fas fa-plus-circle" style="padding-right: 15px; padding-left: 10px;"></i>New Issue</a>
            </div>
            <div class="logout">
                <a href="logout.html"><i class="fas fa-power-off" style="padding-right: 15px; padding-left: 10px;"></i>Log Out</a>
            </div>
        </aside>
        
        <main>
            <div class="title">
                <h1>Issues</h1>
            </div>
            <div class="create">
                <a class="createlink" href="createnewissue.html">Create New Issue</a>
            </div>
            
            </br></br></br></br></br></br>
            
            <label for="btn">Filter by:</label>
            <div id="myBtnContainer">
                <button class="btn active" onclick="filterSelection('all')">ALL</button>
                <button class="btn" onclick="filterSelection('open')">Open</button>
                <button class="btn" onclick="filterSelection('mytickets')">My Tickets</button>
            </div>
            
            </br></br></br></br></br></br>
            
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($issues as $issue): ?>
                        <tr>
                            <td><?= $issue['id']; ?></td>
                            <td><?= $issue['title']; ?></td>
                            <td><?= $issue['description']; ?></td>
                            <td><?= $issue['type_']; ?></td>
                            <td><?= $issue['priority']; ?></td>
                            <td><?= $issue['status']; ?></td>
                            <td><?= $issue['assigned_to']; ?></td>
                            <td><?= $issue['created_by']; ?></td>
                            <td><?= $issue['created']; ?></td>
                            <td><?= $issue['updated']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
        </main>
    </body>
</html>
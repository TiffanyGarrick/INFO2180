<?php include ('dashboard.php');?>
<html>
    <head>
        <title>BugMe Tracker - Home</title>
        <link rel="stylesheet" href="dashboard.css" media="screen">
        <style type="text/css">
            table{
                border-collapse: collapse;
                width: 100%;
                color: black;
                font-family: "Times New Roman" serif;
                text-align: left;
                padding: 8px;
            }

            tr:hover{
                background-color: #ddd;
            }

            th{
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #f2f2f2;
                color: black;
            }

            td{
                padding: 10px;
                text-align: center;
            }

            #titlehead{
                text-align: left;
            }

            #open{
                background-color: #04cf69;
                color: white;
                border-radius: 5px;
                text-align: center;
                font-weight: bolder;
            }

            #progress{
                background-color: #ffc917;
                color: white;
                border-radius: 5px;
                text-align: center;
                font-weight: bolder;
            }

            #closed{
                background-color: #ff7f17;
                color: white;
                border-radius: 5px;
                text-align: center;
                font-weight: bolder;
            }

            #issuetitle{
                color: #1c7eff;
                text-align: left;
            }


        </style>
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
            <div class="title">
                <h1>Issues</h1>
            </div>
            <div class="create">
                <a class="createlink" href="createissue.php">Create New Issue</a>
            </div>
            
            </br></br></br></br></br></br>
            
            <label for="btn">Filter by:</label>
            <div id="myBtnContainer">
                <button class="btn active" id="allbtn" type="button">ALL</button>
                <button class="btn" id="openbtn" type="button">Open</button>
                <button class="btn" id="ticketsbtn" type="button">My Tickets</button>
            </div>
            
            
            <table>
                    <thead>
                        <tr>
                            <th id="titlehead">Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($issues as $issue){
                            echo '<tr>
                                    <td id="issuetitle">#'.$issue['id'].' '.$issue['title'].'</td>
                                    <td>'.$issue['type'].'</td>';
                                    

                            if ($issue['status'] == "Open"){
                                echo '<td id="open">'.$issue['status'].'</td>';
                            } elseif ($issue['status'] == "In Progress"){
                                echo '<td id="progress">'.$issue['status'].'</td>';
                            }elseif ($issue['status'] == "Closed") {
                                echo '<td id="closed">'.$issue['status'].'</td>';
                            }else{
                                echo '<td>'.$issue['status'].'</td>';
                            }
                                   echo '<td>'.$issue['assigned_to'].'</td>
                                    <td>'.$issue['created'].'</td>
                                </tr>';
                        } ?>
                    </tbody>
            </table>
            
        </main>
    </body>
</html>
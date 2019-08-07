<?php
    session_start();
    if (!(isset($_SESSION['user_role_id'])))
    {
        header("Location: ../index.php");
    }
?>
<html>
    <head>
        <title>Add Todo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <?php
                    if ($_SESSION['user_role_id'] == 100)
                    {
                        echo "<a class='navbar-brand' href='../admin/admin_view.php'>Todo App</a>";
                    }
                    else
                    {
                        echo "<a class='navbar-brand' href='../user/user_view.php'>Todo App</a>";
                    }
                ?>
                </div>
                <ul class="nav navbar-nav navbar-right">
                <?php  
                    if ($_SESSION['user_role_id'] == 100)
                    {
                        echo "<li><a href='../admin/admin_view.php'><p>Welcome, ". $_SESSION['username'] ."</p></a></li>";
                    }
                    else
                    {
                        echo "<li><a href='../user/user_view.php'><p>Welcome, ". $_SESSION['username'] ."</p></a></li>";
                    }
                ?>
                <li><a href="../index.php?logout=yes"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
                <form action="./add_todo_process.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3" for="title">Title: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="todo_title" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="desc">Description: </label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="todo_desc" cols="30" rows="10"  ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-4">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </div>                    
                </form> 
        </div>
         
    </body>
</html>

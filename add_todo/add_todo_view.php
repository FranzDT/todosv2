<?php
    
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
                <a class="navbar-brand" href="../index.php">Todo App</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
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
                            <input type="text" class="form-control" name="todo_desc" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-4">
                            <button type="submit" class="btn btn-primary" > ADD</button>
                        </div>
                    </div>                    
                </form> 
        </div>
         
    </body>
</html>

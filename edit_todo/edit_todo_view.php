<?php
    require "../function/function.php";
    $id = $_GET['todoid'];
    $result = getTodo($id);
    while ($row = $result->fetch_assoc())
    {
        $title = $row['todo_title'];
        $desc = $row['todo_desc'];
    }
?>
<html>
    <head>
        <title>Edit Todo</title>
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
            <form action="./edit_todo_process.php" method="POST" class="form-horizontal"> 
                <div class="form-group">
                    <label for="title" class="control-label col-md-3">Title:</label>
                    <div class="col-md-5">
                        <input class="form-control" type="text" name="todo_title" placeholder="<?php echo $title; ?>" value="<?php echo $title; ?>">
                    </div>
                </div>
                <div class="form-group">
                <label for="desc" class="control-label col-md-3">Description:</label>
                    <div class="col-md-5">
                        <input class="form-control" type="text" name="todo_desc" placeholder="<?php echo $desc; ?>" value="<?php echo $desc; ?>">
                    </div>
                </div>
                <input type="hidden" name="todo_id" value="<?php echo $id; ?>">
                <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
                <div class="form-group">
                    <div class="control-label col-md-4">
                        <button type="submit" class="btn btn-primary">Update </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

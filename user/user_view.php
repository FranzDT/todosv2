<?php
    require "../function/function.php";

    if (isset($_GET['addtodo']))
    {
        if ($_GET['addtodo'] == 'success')
        {
            echo "successfully added todo";
        }
        else
        {
            echo "failed to add todo";
        }
    }

    if (isset($_GET['edittodo']))
    {
        if ($_GET['edittodo'] == 'yes')
        {
            echo "Update successful";
        }
        else
        {
            echo "failed to update todo";
        }
    }

    if (isset($_GET['deletetodo']))
    {
        if ($_GET['deletetodo'] == 'yes')
        {
            echo "Todo deletion successful";
        }
        else
        {
            echo "failed to delete todo";
        }
    }
?>
<html>
    <head>
        <title>User</title>
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
        
        <?php  
            if (isset($_SESSION['edit_todo_user_id']))
            {
                if (isset($_GET['admingetuser']))
                {
                    $_SESSION['edit_todo_user_id'] = $_GET['admingetuser'];
                }
                echo "<br><a href='../admin/admin_view.php'>Back to Admin</a><br>";
                echo "<br>USER ".$_SESSION['edit_todo_user_id'];
                $result = getUserTodo($_SESSION['edit_todo_user_id']);
            }
            else
            {
                $result = getUserTodo($_SESSION['user_id']);
            }
        ?>
    
        </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                    <a href="../add_todo/add_todo_view.php" class="btn btn-warning" role="button">&plus;</a>
                        <?php 
                        while ($row = $result->fetch_assoc())
                        {
                        ?>
                        <div class="card bg-warning" style="width:400px">
                                <div class="card-body">
                                    <h2 class="card-title text-center">
                                    <a href="../edit_todo/edit_todo_view.php?todoid=<?php echo $row['todo_id']; ?>"> <?php echo $row['todo_title']; ?></a>
                                    </h2>
                                    <p class="card-text text-center"><h4 class="text-center"><?php echo $row['todo_desc']; ?></h4><br></p>
                                    <p class="card-text text-center">Status: <?php echo $row['todo_status'] ?>
                                    <a href="../delete/delete_todo.php?todoid=<?php echo $row['todo_id'] ?>">Delete</a> </p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    </div>
                </div>
            </div>
                
    </body>
</html>

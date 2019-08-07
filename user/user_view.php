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
        
        <?php  
            if (isset($_SESSION['edit_todo_user_id']))
            {
                if (isset($_GET['admingetuser']))
                {
                    $_SESSION['edit_todo_user_id'] = $_GET['admingetuser'];
                }
                $id = $_SESSION['edit_todo_user_id'];
                $backlog = getUserTodoBacklog($_SESSION['edit_todo_user_id']);
                $progress = getUserTodoProgress($_SESSION['edit_todo_user_id']);
                $done = getUserTodoDone($_SESSION['edit_todo_user_id']);
            }
            else
            {
                $backlog = getUserTodoBacklog($_SESSION['user_id']);
                $progress = getUserTodoProgress($_SESSION['user_id']);
                $done = getUserTodoDone($_SESSION['user_id']);
            }
        ?>
        </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h1><a href="../add_todo/add_todo_view.php">&plus;</a></h1>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                    <?php  
                        if (isset($_SESSION['edit_todo_user_id']))
                        {
                            echo "<H4>USER: ". $id ."</H4>";
                        }          
                    ?>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>BACKLOG</h3>
                        <?php 
                        while ($row = $backlog->fetch_assoc())
                        {
                        ?>
                            <div class="card bg-warning" style="width:350px">
                                <div class="card-body">
                                    <h2><a class="text-danger" href="../delete/delete_todo.php?todoid=<?php echo $row['todo_id'] ?>">&times;</a></h2>
                                    <h2 class="card-title text-center">
                                    <a href="../edit_todo/edit_todo_view.php?todoid=<?php echo $row['todo_id']; ?>"> <?php echo $row['todo_title']; ?></a>
                                    </h2>
                                    <p class="card-text text-center"><h4 class="text-center"><?php echo $row['todo_desc']; ?></h4><br></p>      
                                    <div class="btn-group btn-group-justified">
                                        <a href="../set_task/set_task.php?taskto=progress&id=<?php echo $row['todo_id'] ?>" class="btn btn-primary">>></a>
                                    </div>              
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-3">
                    <h3>IN-PROGRESS</h3>
                    <?php  
                        while ($row = $progress->fetch_assoc())
                        {
                        ?>
                            <div class="card bg-info" style="width:350px">
                                <div class="card-body">
                                    <h2><a class="text-danger" href="../delete/delete_todo.php?todoid=<?php echo $row['todo_id'] ?>">&times;</a></h2>
                                    <h2 class="card-title text-center">
                                    <a href="../edit_todo/edit_todo_view.php?todoid=<?php echo $row['todo_id']; ?>"> <?php echo $row['todo_title']; ?></a>        
                                    </h2>
                                    <p class="card-text text-center"><h4 class="text-center"><?php echo $row['todo_desc']; ?></h4><br></p>  
                                    <div class="btn-group btn-group-justified">
                                        <a href="../set_task/set_task.php?taskto=backlog&id=<?php echo $row['todo_id'] ?>" class="btn btn-primary"><<</a>
                                        <a href="../set_task/set_task.php?taskto=done&id=<?php echo $row['todo_id'] ?>" class="btn btn-primary">>></a>
                                    </div>                                                                        
                                </div>
                            </div>
                        <?php
                        }
                        ?>  
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-3">
                    <h3>DONE</h3>
                    <?php  
                        while ($row = $done->fetch_assoc())
                        {
                        ?>
                            <div class="card bg-success" style="width:350px">
                                <div class="card-body">
                                    <h2><a class="text-danger" href="../delete/delete_todo.php?todoid=<?php echo $row['todo_id'] ?>">&times;</a></h2>
                                    <h2 class="card-title text-center">
                                    <a href="../edit_todo/edit_todo_view.php?todoid=<?php echo $row['todo_id']; ?>"> <?php echo $row['todo_title']; ?></a>
                                    </h2>
                                    <p class="card-text text-center"><h4 class="text-center"><?php echo $row['todo_desc']; ?></h4><br></p>
                                    <div class="btn-group btn-group-justified">
                                        <a href="../set_task/set_task.php?taskto=progress&id=<?php echo $row['todo_id'] ?>" class="btn btn-primary"><<</a>
                                    </div>  
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

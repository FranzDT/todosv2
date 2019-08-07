<?php  
    require "../function/function.php";
    $_SESSION['edit_todo_user_id'] = 0;
    if (isset($_SESSION['user_role_id']))
    {
        if ($_SESSION['user_role_id'] == 200)
        {
            header("Location: ../user/user_view.php");
        }
    }
    else
    {
        header("Location: ../index.php");
    }
?>
<html>
    <head>
        <title>Admin</title>
        
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
                <a class="navbar-brand" href="#">Todo App</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../admin/admin_view.php"><p>Welcome, <?php echo $_SESSION['username'] ?></p></a></li>
                <li><a href="../index.php?logout=yes"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                </ul>
            </div>
        </nav>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Last Sign-in</th>
                <th>Action</th>
            </tr>
            <tr>    
                <?php 
                    $result = adminGetUsers(); 
                    while ($row = $result->fetch_assoc())
                    {
                ?>
                        <tr>
                            <th>
                                <a href="../edit_user/edit_user_view.php?userid=<?php echo $row['user_id']; ?>">
                                    <?php echo $row['user_id']; ?>
                                </a>
                            </th>
                            <th><?php echo $row['first_name']; ?></th>
                            <th><?php echo $row['last_name']; ?></th>
                            <th><?php echo $row['username']; ?></th>
                            <?php
                                if ($row['last_signin'] != NULL){
                            ?>
                                    <th><?php echo date("F j, Y",strtotime($row['last_signin'])); ?></th>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <th><?php echo "Not yet"; ?></th> 
                            <?php
                                }
                            ?>
                            <th>
                                <a href="../user/user_view.php?admingetuser=<?php echo $row['user_id']; ?>">Todo</a> 
                                <?php
                                    if ($row['user_role_id'] == 200){
                                ?>
                                        <a href="../delete/delete_user.php?id=<?php echo $row['user_id'] ?>">Delete</a>
                                <?php
                                    }
                                ?>
                            </th>
                        </tr>
                <?php
                    }
                ?>
            </tr>
        </table>
    </body>
</html>

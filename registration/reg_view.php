<?php
    if (isset($_GET['username']))
    {
        if ($_GET['username'] == 'taken')
        {
            echo "Username is taken <br>";
        }
    }
    
    if (isset($_SESSION['user_role_id']))
    {
        if ($_SESSION['user_role_id'] == 100)
        {
            header("Location: ../admin/admin_view.php");
        }
        else
        {
            header("Location: ../user/user_view.php");
        }
    }
?>
<html>
    <head>
        <title>Registration</title>
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
                <li><a href="../login/login_view.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form action="./reg_process.php" method="POST"> 
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" name="username" required>              
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" required>             
                    </div>
                    <input type="hidden" name="type" value="user">
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </body>
</html>

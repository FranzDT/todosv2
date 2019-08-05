<?php
    session_start();

    // User registration status
    if (isset($_GET['userreg']))
    {
        if ($_GET['userreg']=='success')
        {
            echo 'Success';
            unset($_GET['userreg']);
        }
        else
        {
            echo 'Failed';
            unset($_GET['userreg']);
        }
    }

    if (isset($_GET['logout']))
    {
        if ($_GET['logout'] == 'yes')
        {
            session_destroy();
        }
    }
?>
<html>
    <head>
        <Title>Todo</Title>
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
                <li><a href="./registration/reg_view.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="./login/login_view.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>

        <!-- registration link -->
        <!-- <div class="containers">    
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"><a href="./login/login_view.php">Sign in</a> 
                <a href="./registration/reg_view.php">Register</a><br></div>
            </div>
        </div> -->
        
    </body>
</html>

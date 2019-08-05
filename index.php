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
    </head>
    <body>
        <!-- registration link -->
        <a href="./registration/reg_view.php">Register</a><br>
        <a href="./login/login_view.php">Sign in</a>
    </body>
</html>

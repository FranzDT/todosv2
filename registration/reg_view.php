<?php
    if (isset($_GET['username']))
    {
        if ($_GET['username'] == 'taken')
        {
            echo "Username is taken <br>";
        }
    }
?>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
            <form action="./reg_process.php" method="POST"> 
                First Name: <input type="text" name="first_name" required> <br>
                Last Name: <input type="text" name="last_name" required> <br>
                User Name: <input type="text" name="username" required> <br>
                Password: <input type="password" name="password" required> <br>
                <input type="hidden" name="type" value="user">
                <input type="submit" value="Register">
            </form>
    </body>
</html>

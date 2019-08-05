<?php
  
    $label = $_GET['label'] ?? "Username";
    $input_type = $_GET['input_type'] ?? "uname";
    $username = $_GET['username'] ?? "";
    
    $passwordcheck = $_GET['passwordcheck'] ?? 1;

    if (isset($_GET['username']))
    {
        $type = "password";
            
    }
    else
    {
        $type = "text";
    }
    
    if (isset($_GET['usercheck']))
    {
        if ($_GET['usercheck'] > 0)
        {
            if($passwordcheck == 0)
            {
                echo "Incorrect Password<br>";
                $label = "Password";
                $input_type = "password";
            }else
            {
                $label = "Password";
                $input_type = "password";
            }
        }else{
            echo "Not a User<br>";
        }
    }
?>
<html>
    <head>
        <title>Sign in</title>
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
                <li><a href="../registration/reg_view.php"><span class="glyphicon glyphicon-log-in"></span> Sign Up</a></li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form action="./login_process.php" method="POST">
                    <div class="form-group">
                        <label for="login"><?php echo $label; ?>:</label>
                        <input type="<?php echo $type;?>" name="<?php echo $input_type; ?>" required>
                    </div>
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    <input type="submit" value="SIGN IN">
                </form>
            
            </div>
        </div>
        
    </body>
</html>

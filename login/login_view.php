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
    </head>
    <body>
        <form action="./login_process.php" method="POST">
            <?php echo $label; ?>: <input type="<?php echo $type;?>" name="<?php echo $input_type; ?>" required><br>
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="submit" value="SIGN IN">
        </form>
    </body>
</html>

<?php
    require "../function/function.php";
    $user_id = $_GET['userid'];
    $result = getUserDetail($user_id);
    while ($row = $result->fetch_assoc())
    {
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $username = $row['username'];
    }
?>
<html>
    <head>
        <title>Edit user</title>
    </head>
    <body>
        <?php  
            require "../header/header.php";
        ?>

        <form action="./edit_user_process.php" METHOD="POST">
            First Name:<input type="text" name="first_name" placeholder="<?php echo $firstname; ?>" value="<?php echo $firstname; ?>"><br>
            Last Name:<input type="text" name="last_name" placeholder="<?php echo $lastname; ?>" value="<?php echo $lastname; ?>"> <br>
            Username<input type="text" name="username" placeholder="<?php echo $username; ?>" value="<?php echo $username; ?>"> <br>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="submit" value="Update"> <br>
        </form>
    </body>
</html>

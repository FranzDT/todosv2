<?php  
    require "../function/function.php";
?>
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        <?php require "../header/header.php" ?> <br>
        <a href="./admin_view.php?view=user">Users</a>
        <a href="./admin_view.php?view=todo">Todo</a>

        <table>
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
                                <a href="../edit_user/edit_user_view.php?userid=<?php echo $row['user_id'] ?>">
                                    <?php echo $row['user_id']; ?>
                                </a>
                            </th>
                            <th><?php echo $row['first_name'] ?></th>
                            <th><?php echo $row['last_name'] ?></th>
                            <th><?php echo $row['username'] ?></th>
                            <th><?php echo $row['last_signin'] ?></th>
                            <th>
                                <a href="../user/user_view.php?admingetuser=<?php echo $row['user_id']; ?>">Todo</a>
                                <a href="../">Delete</a>
                            </th>
                        </tr>
                <?php
                    }
                ?>
            </tr>
        </table>
    </body>
</html>

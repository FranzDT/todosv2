<?php
    require "../function/function.php";
    if (!(isset($_SESSION['user_id'])))
    {
        header("Location: ../index.php");
    }
    $user_id = $_GET['userid'];
    $result = getUserDetail($user_id);
    while ($row = $result->fetch_assoc())
    {
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $username = $row['username'];
    }

    if (isset($_GET['userused']))
    {
            echo "Username is already taken";
    }
?>
<html>
    <head>
        <title>Edit user</title>
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
                <li><a href='../admin/admin_view.php'><p>Welcome, <?php echo $_SESSION['username']?></p></a></li>
                <li><a href="../index.php?logout=yes"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <form action="./edit_user_process.php" METHOD="POST" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-3" for="fname">First Name:</label>
                    <div class="col-md-5"> 
                        <input class="form-control" type="text" name="first_name" placeholder="<?php echo $firstname; ?>" value="<?php echo $firstname; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="fname">Last Name:</label>
                    <div class="col-md-5"> 
                        <input class="form-control" type="text" name="last_name" placeholder="<?php echo $lastname; ?>" value="<?php echo $lastname; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="fname">Username: </label>
                    <div class="col-md-5"> 
                        <input class="form-control" type="text" name="username" username="<?php echo $username; ?>" value="<?php echo $username; ?>">
                    </div>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="uname" value="<?php echo $username; ?>">
                <div class="form_group">
                    <div class="control-label col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

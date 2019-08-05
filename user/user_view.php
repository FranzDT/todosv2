<?php
    require "../function/function.php";

    if (isset($_GET['addtodo']))
    {
        if ($_GET['addtodo'] == 'success')
        {
            echo "successfully added todo";
        }
        else
        {
            echo "failed to add todo";
        }
    }

    if (isset($_GET['edittodo']))
    {
        if ($_GET['edittodo'] == 'yes')
        {
            echo "Update successful";
        }
        else
        {
            echo "failed to update todo";
        }
    }

    if (isset($_GET['deletetodo']))
    {
        if ($_GET['deletetodo'] == 'yes')
        {
            echo "Todo deletion successful";
        }
        else
        {
            echo "failed to delete todo";
        }
    }
?>
<html>
    <head>
        <title>User</title>
    </head>
    <body>
        <?php require "../header/header.php"; ?>
        
         <a href="../add_todo/add_todo_view.php">Add Task</a>

        <?php  
            if (isset($_SESSION['edit_todo_user_id']))
            {
                if (isset($_GET['admingetuser']))
                {
                    $_SESSION['edit_todo_user_id'] = $_GET['admingetuser'];
                }
                echo "<br><a href='../admin/admin_view.php'>Back to Admin</a><br>";
                echo "<br>USER ".$_SESSION['edit_todo_user_id'];
                $result = getUserTodo($_SESSION['edit_todo_user_id']);
            }
            else
            {
                $result = getUserTodo($_SESSION['user_id']);
            }
        ?>
        <table>
            <tr>
                <th>Task Title</th>
                <th>Task Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php 
                while ($row = $result->fetch_assoc())
                {
            ?>

            <tr>
                <th>
                    
                    <a href="../edit_todo/edit_todo_view.php?todoid=<?php echo $row['todo_id']; ?>"> 
                    <?php 
                        echo $row['todo_title']; 
                    ?> 
                    </a>
                </th>
                <th> 
                    <?php echo $row['todo_desc'] ?> 
                </th>
                <th> 
                    <?php echo $row['todo_status'] ?>
                </th>
                <th>
                    <a href="../delete/delete_todo.php?todoid=<?php echo $row['todo_id'] ?>">Delete</a>
                </th>
            </tr>

            <?php
                }
            ?>
        </table>
    </body>
</html>

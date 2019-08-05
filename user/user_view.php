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
?>
<html>
    <head>
        <title>User</title>
    </head>
    <body>
        <?php require "../header/header.php"; ?>

         <a href="../add_todo/add_todo_view.php">Add Task</a>

        <table>
            <tr>
                <th>Task Title</th>
                <th>Task Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php  
                if ($_SESSION['user_role_id'] == 100)
                {
                    if(!(isset($_SESSION['edit_todo_user_id'])))
                    {
                        $_SESSION['edit_todo_user_id'] = $_GET['admingetuser'];
                    }
                    
                    $result = getUserTodo($_SESSION['edit_todo_user_id']); 
                }
                else
                {
                    $result = getUserTodo(); 
                    $userid = $_SESSION['user_id'];
                }
    
                while ($row = $result->fetch_assoc())
                {
            ?>

            <tr>
                <th>
                    
                    <a href="../edit_todo/edit_todo_view.php?todoid=<?php echo $row['todo_id']; ?>&userid=<?php echo $_SESSION['edit_todo_user_id']; ?>"> 
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
                    <a href="../delete_todo/delete_todo_view.php?todoid=<?php echo $row['todo_id'] ?>">Delete</a>
                </th>
            </tr>

            <?php
                }
            ?>
        </table>
    </body>
</html>

<?php
    require "../function/function.php";

    $todo_title = $_POST['todo_title'];
    $todo_desc = $_POST['todo_desc'];

    if (addTodo($_SESSION['user_id'], $todo_title, $todo_desc))
    {
        header("Location: ../user/user_view.php?addtodo=success");
    }
    else
    {
        header("Location: ../user/user_view.php?addtodo=failed");
    }
?>

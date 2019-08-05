<?php
    require "../function/function.php";

    $todo_title = $_POST['todo_title'];
    $todo_desc = $_POST['todo_desc'];
    if (isset($_SESSION['edit_todo_user_id']))
    {
        $id = $_SESSION['edit_todo_user_id'];
    }
    else
    {
        $id = $_SESSION['user_id'];
    }

    if (addTodo($id, $todo_title, $todo_desc))
    {
        header("Location: ../user/user_view.php?addtodo=success");
    }
    else
    {
        header("Location: ../user/user_view.php?addtodo=failed");
    }
?>

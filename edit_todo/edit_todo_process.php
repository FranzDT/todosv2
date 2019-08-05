<?php
    require "../function/function.php";
    $title = $_POST['todo_title'];
    $desc = $_POST['todo_desc'];
    $id = $_POST['todo_id'];
    $user_id = $_POST['user_id'];
    if (editTodo($id, $title, $desc) === true)
    {
        header("Location: ../user/user_view.php?edittodo=yes");
    }
    else
    {
        header("Location: ../user/user_view.php?edittodo=no");
    }
?>

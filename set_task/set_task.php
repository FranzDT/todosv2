<?php
    require "../function/function.php";

    $action = $_GET['taskto'];
    $todo_id = $_GET['id'];

    if ($action == 'backlog')
    {
        if (setTodoBacklog($todo_id) === true)
        {
            header("Location: ../user/user_view.php?edittodo=yes");
        }
        else
        {
            header("Location: ../user/user_view.php?edittodo=no");
        }
    }
    elseif ($action == 'progress')
    {
        if (setTodoProgress($todo_id) === true)
        {
            header("Location: ../user/user_view.php?edittodo=yes");
        }
        else
        {
            header("Location: ../user/user_view.php?edittodo=no");
        }
    }
    elseif ($action == 'done')
    {
        if (setTodoDone($todo_id) === true)
        {
            header("Location: ../user/user_view.php?edittodo=yes");
        }
        else
        {
            header("Location: ../user/user_view.php?edittodo=no");
        }
    }
?>
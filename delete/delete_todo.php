<?php
    require "../function/function.php";
    $id = $_GET['todoid'];

    if (deleteTodo($id) === true)
    {
        header("Location: ../user/user_view.php?deletetodo=yes");
    }
    else
    {
        header("Location: ../user/user_view.php?deletetodo=yes");
    }
?>
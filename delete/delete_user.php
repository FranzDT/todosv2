<?php
    require "../function/function.php";
    $user_id = $_GET['id'];
    if (deleteUser($user_id) === true)
    {
        header("Location: ../admin/admin_view.php?deleteuser=yes");
    }
    else
    {
        header("Location: ../admin/admin_view.php?deleteuser=no");
    }
?>
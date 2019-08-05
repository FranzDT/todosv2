<?php
    require "../function/function.php";
    $id = $_GET['id'];
    if (deleteUser($id) === true)
    {
        header("Location: ../admin/admin_view.php?deleteuser=yes");
    }
    else
    {
        header("Location: ../admin/admin_view.php?deleteuser=no");
    }
?>
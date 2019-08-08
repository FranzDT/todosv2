<?php
    require "../function/function.php";
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $uname = $_POST['uname'];

    if($username == $uname)
    {
        if (editUser($user_id, $first_name, $last_name, $username))
        {
            header("Location: ../admin/admin_view.php?edituser=yes");
        }
        else
        {
            header("Location: ../admin/admin_view.php?edituser=yes");
        }
    }
    else
    {
        if (checkUser($username) === true)
        {
            header("Location: ./edit_user_view.php?userused=1&userid=".$user_id);
        }
    }
?>  

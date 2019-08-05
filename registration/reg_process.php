<?php
    require "../function/function.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $role = $_POST['role'] ?? 200;
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    if(checkUser($username) === true)
    {
        header("Location: ./reg_view.php?username=taken");
    }
    else
    {
        if(registerUser($first_name, $last_name, $username, $password, $role))
        {
            header("Location: ../index.php?userreg=success");
        }
        else
        {
            header("Location: ../index.php?userreg=failed");
        }
    }
?>

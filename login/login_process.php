<?php
    require "../function/function.php";
     
    
    $checkuser = $_POST['uname']??"";
    $password = $_POST['password'] ?? "";
    $username = $_POST['username'] ?? "";
    
    if (isset($_POST['uname']))
    {
        if (checkUser($checkuser) === true)
        {
            header("Location: ./login_view.php?&usercheck=1&username=". $checkuser);
        }else
        {
            header("Location: ./login_view.php?usercheck=0");
        }
    }
    elseif (isset($_POST['password']))
    {
        if (verifyPassword($username, $password))
        {
            setUserDetail($username);
            setSignIn($username);
            if ($_SESSION['user_role_id'] == 200)
            {
                header("Location: ../user/user_view.php");
            }
            elseif ($_SESSION['user_role_id'] == 100)
            {
                header("Location: ../admin/admin_view.php");
            }
        }
        else
        {
            header("Location: ./login_view.php?&usercheck=1&passwordcheck=0&username=". $username);
        }
    }

?>

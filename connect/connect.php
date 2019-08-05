<?php
    $servername= "localhost";
    $username= "root";
    $password= "";
    $db = "todo";
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error)
    {
        die("CONNECTION ERROR: ". $conn-connect_error);
    }
?>

<?php
    $servername= "localhost";
    $username= "root";
    $password= "";
    $db = "todov2";
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error)
    {
        die("CONNECTION ERROR: ". $conn-connect_error);
    }
?>

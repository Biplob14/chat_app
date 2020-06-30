<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbName = "chat_app";

    $conn = mysqli_connect($server, $user, $password, $dbName) or die("Database connection failed.");
?>
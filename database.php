<?php

function databaseConnection()
{
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db_name = "rayan_login";

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if($conn->connect_errno) {
        die("Connection Error");
    } else {
        return $conn;
    }
}

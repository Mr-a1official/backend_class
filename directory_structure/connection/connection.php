<?php
function connection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "chat_systems";
    $connection = mysqli_connect($host, $username, $password, $db);
    if ($connection) {
        return $connection;
    } else {
        throw new Exception("Error processing request could not connect to db {$db}" . mysqli_connect_error(), 1);
    }
}

<?php
require_once(__DIR__ . "/../connection/connection.php");

function get_user_login_data($table, $username)
{
    $sql = "SELECT * FROM $table WHERE username='$username'";
    $stmt = mysqli_query(connection(), $sql);
    if (mysqli_num_rows($stmt) > 0) {
        return $stmt;
    } else {
        throw new Exception("Invalid username", 1);
    }
}
function redirect($location)
{
    return header("Location:" . $location);
}
function save_message($type, $message)
{
    $_SESSION[$type] =  $message;
}

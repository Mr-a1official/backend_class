<?php
require_once(__DIR__ . "/../connection/connection.php");

function get_user_login_data($table, $username)
{
    $sql = "SELECT * FROM $table WHERE username='$username'";
    $stmt = mysqli_query(connection(), $sql);
    if (mysqli_num_rows($stmt) > 0) {
        return $stmt;
    }
}
function get_all_users()
{
    $stmt = "SELECT * FROM users";
    $stmt = mysqli_query(connection(), $stmt);
    return $stmt;
}
function redirect($location)
{
    return header("Location:" . $location);
}
function save_message($type, $message)
{
    $_SESSION[$type] =  $message;
}

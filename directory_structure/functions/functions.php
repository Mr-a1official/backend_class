<?php
require_once(__DIR__ . "/../connection/connection.php");
function save_user($username, $password)
{
    $stmt = "INSERT INTO users(username,password) VALUES ('$username','$password')";
    $stmt = mysqli_query(connection(), $stmt);
    if ($stmt) {
        return true;
    } else {
        throw new Exception("Error Processing Request Could Not Save User", 1);
    }
}
function edit_user()
{
}
function delete_user()
{
}

function get_users()
{
}
$username =  "Destiny";
$password = password_hash("destiny", PASSWORD_DEFAULT);
try {
    save_user($username, $password);
    echo "registered";
} catch (\Exception $e) {
    echo $e->getMessage();
}

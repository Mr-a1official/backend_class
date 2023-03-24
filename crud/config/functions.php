<?php
require_once(__DIR__ . '/connection.php');
function message($type, $message)
{
   $_SESSION[$type] = $message;
}
function redirect($location)
{
   return header('location:' . $location . '.php');
}
function insert($username, $password)
{
   $stmt = "INSERT INTO users(username,password) VALUES('$username','$password')";
   $stmt = mysqli_query(connection(), $stmt);
   return $stmt;
}
function get_users()
{
   $stmt = "SELECT * FROM users";
   $stmt = mysqli_query(connection(), $stmt);
   return $stmt;
}

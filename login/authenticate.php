<?php
require_once(__DIR__ . "/functions/functions.php");

function authenticate($table, $username, $password)
{
    $login_data = get_user_login_data($table, $username);
    if ($login_data) {
        $row = mysqli_fetch_assoc($login_data);
        if (password_verify($password, trim($row['password']))) {
            $_SESSION['logged_in_id'] = $row[$table . "_id"];
            return true;
        } else {
            throw new Exception("Invalid username and password combination", 1);
        }
    }
}
$username = trim("users");
$password = trim("francis");
try {
    if (authenticate("admin", $username, $password)) {
        $_SESSION['is_logged_in_admin'] = true;
        $_SESSION['admin_id'] = $_SESSION['logged_in_id'];
        save_message("success", "Admin have been logged in");
        redirect("where you want to go");
    } elseif (authenticate("users", $username, $password)) {
        $_SESSION['is_logged_in_user'] = true;
        $_SESSION['user_id'] = $_SESSION['logged_in_id'];
        save_message("success", "User have been logged in");
        redirect("where you want to go");
    }
} catch (\Exception $e) {
    save_message("error", $e->getMessage());
    redirect("where you want to go");
}

/**
 ** Assignment 
 * Debug the user authenticate section is not working
 */

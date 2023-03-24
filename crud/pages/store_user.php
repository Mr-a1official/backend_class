<?php
require_once(__DIR__ . '/../config/session.php');
require_once(__DIR__ . '/../config/form_validation.php');
require_once(__DIR__ . '/../config/functions.php');

$username = $_POST['username'];
$password = $_POST['password'];

try {
   required($username, 'Username');
   required($password, 'Password');
   insert($username, password_hash($password, PASSWORD_DEFAULT));
   message('success', 'User Created');
   redirect('view_users');
} catch (\Exception $e) {
   message('error', $e->getMessage());
   redirect('add_users');
}

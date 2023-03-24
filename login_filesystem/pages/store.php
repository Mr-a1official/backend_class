<?php
require_once("../config/session.php");
require_once("../function/function.php");
$username = $_POST['username'];
$password = $_POST['password'];

try {
   if ($username == "" || $password == "") {
      throw new Exception("Error Processing Request Input Cannot Be Empty", 1);
   } else {
      create_user_data($username, $password);
      $_SESSION['success'] = "Account created";
      return header('location:login.php');
   }
} catch (\Exception $e) {
   $_SESSION['values'] = [
      'username' => $username
   ];
   $_SESSION['error'] = $e->getMessage();
   return header('location:signup.php');
}
